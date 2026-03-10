<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class payment_verification_controller extends Controller
{
    public function payment_verification_page(){
        return view('admin.payment_verification.add_payment_verification');
    }
    
    public function store(Request $request){
        // Validate the incoming request data
        $validatedData = $request->validate([
            'email'      => 'required|email',
            'number'     => 'required|string|max:15',
            'rupees'     => 'required|numeric|min:1',
            'utr_number' => 'required|string|max:50|unique:verification_payment_tables,utr_number',
            'image'      => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'message'    => 'nullable|string|max:500',
        ]);

        // Handle the file upload
        if ($request->hasFile('image')) {
            $img = 'blkheartyt' . time() . '.' . $request->file('image')->extension();
            $request->file('image')->move(public_path('payment_verification_images'), $img);
        } else {
            $img = null;
        }
        
        // Find user by phone number to get user_id
        $user = DB::table('users_auth_tables')->where('phone', $request->number)->first();
        
        $arraypayment = array(
            'user_id' => $user->id ?? '',
            'number' => $request->number,
            'rupees' => $request->rupees,
            'utr_number' => $request->utr_number,
            'image' => $img,
            'message' => $request->message,
            'status' => 'pending',
            'created_at' => now(),
            'updated_at' => now()
        );

        DB::table('verification_payment_tables')->insert($arraypayment);
        return redirect()->back()->with('success', 'Payment verification details submitted successfully.');
    }
    
    public function show_payment_verification(){
        $payment = DB::table('verification_payment_tables')->get();
        return view('admin.payment_verification.show_payment_verification', compact('payment'));
    }
    
    public function delete_payment_verification($id){
        DB::table('verification_payment_tables')->where('id', $id)->delete();
        return redirect()->back()->with('success', 'Payment verification entry deleted successfully.');
    }
    
    public function edit_payment_verification($id){
        $payment = DB::table('verification_payment_tables')->where('id', $id)->first();
        
        if (!$payment) {
            return redirect('admin/payment_verification')->with('error', 'Payment not found');
        }
        
        return view('admin.payment_verification.edit_payment_verification', compact('payment'));
    }

    public function testDailyCredit()
    {
        $today = date('Y-m-d');
        
        $activePlans = DB::table('user_plans')
            ->where('status', 1)
            ->get();
        
        echo "<h2>Daily Credit Test</h2>";
        echo "Found " . $activePlans->count() . " active plans<br><br>";
        
        if($activePlans->count() == 0) {
            echo "No active plans found to credit.";
            echo "<br><br><a href='/admin/dashboard'>Back to Dashboard</a>";
            return;
        }
        
        foreach($activePlans as $plan) {
            if($plan->days_completed >= $plan->duration_days) {
                echo "❌ Plan ID {$plan->id} - Already completed (days_completed: {$plan->days_completed}/{$plan->duration_days})<br>";
                
                DB::table('user_plans')
                    ->where('id', $plan->id)
                    ->update(['status' => 0]);
                continue;
            }
            
            $dailyIncome = $plan->daily_income;
            
            DB::table('user_plans')
                ->where('id', $plan->id)
                ->update([
                    'days_completed' => $plan->days_completed + 1,
                    'total_earned' => $plan->total_earned + $dailyIncome,
                    'status' => ($plan->days_completed + 1 >= $plan->duration_days) ? 0 : 1
                ]);
            
            DB::table('daily_wallet')->insert([
                'user_id' => $plan->user_id,
                'user_plan_id' => $plan->id,
                'amount_credited' => $dailyIncome,
                'credit_date' => $today,
                'status' => 'credited',
                'created_at' => now(),
                'updated_at' => now()
            ]);
            
            echo "✅ Credited ₹{$dailyIncome} to Plan ID {$plan->id} (Day " . ($plan->days_completed + 1) . "/{$plan->duration_days})<br>";
        }
        
        echo "<br><br>";
        echo "<a href='/user/dashboard' target='_blank'>Check User Dashboard</a> | ";
        echo "<a href='/admin/dashboard'>Back to Admin</a>";
    }
    
    // ===== PAYMENT APPROVAL WITH ONE-TIME 10% COMMISSION =====
    public function approve_payment($id)
    {
        // Find the payment
        $payment = DB::table('verification_payment_tables')->where('id', $id)->first();
        
        if (!$payment) {
            return redirect()->back()->with('error', 'Payment not found');
        }
        
        // Update payment status to approved
        DB::table('verification_payment_tables')
            ->where('id', $id)
            ->update([
                'status' => 'approved',
                'updated_at' => now()
            ]);
        
        // Add assets to user
        $userAsset = DB::table('user_assets')->where('phone', $payment->number)->first();
        
        if ($userAsset) {
            DB::table('user_assets')
                ->where('id', $userAsset->id)
                ->update([
                    'total_assets' => $userAsset->total_assets + $payment->rupees,
                    'remaining_assets' => $userAsset->remaining_assets + $payment->rupees,
                    'updated_at' => now()
                ]);
        } else {
            DB::table('user_assets')->insert([
                'user_id' => $payment->user_id,
                'phone' => $payment->number,
                'total_assets' => $payment->rupees,
                'used_assets' => 0,
                'remaining_assets' => $payment->rupees,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
        
        // ===== ONE-TIME 10% COMMISSION ON PAYMENT =====
        $this->payOneTimePaymentCommission($payment);
        
        return redirect()->back()->with('success', 'Payment approved successfully! 5% referral bonus added to referrer.');
    }
    
    /**
     * Pay ONE-TIME 10% commission when referred user makes FIRST payment
     */
    private function payOneTimePaymentCommission($payment)
    {
        // Get the user who made the payment
        $user = DB::table('users_auth_tables')->where('phone', $payment->number)->first();
        
        if(!$user) return;
        
        // Check if this user has already given payment commission (to prevent multiple payments)
        $alreadyPaid = DB::table('referral_relationships')
            ->where('referred_id', $user->id)
            ->where('commission_type', 'payment')
            ->exists();
        
        if($alreadyPaid) return; // Already paid once
        
        // Get ONLY level 1 (direct referrer)
        $directReferrer = DB::table('referral_relationships')
            ->where('referred_id', $user->id)
            ->where('level', 1)
            ->first();
        
        if(!$directReferrer) return;
        
        // Calculate 10% commission
        $commissionAmount = ($payment->rupees * 5) / 100;
        
        // Add to referrer's assets
        $referrerAsset = DB::table('user_assets')->where('user_id', $directReferrer->referrer_id)->first();
        
        if($referrerAsset) {
            DB::table('user_assets')
                ->where('id', $referrerAsset->id)
                ->update([
                    'total_assets' => $referrerAsset->total_assets + $commissionAmount,
                    'remaining_assets' => $referrerAsset->remaining_assets + $commissionAmount,
                    'updated_at' => now()
                ]);
        } else {
            $referrer = DB::table('users_auth_tables')->where('id', $directReferrer->referrer_id)->first();
            if($referrer) {
                DB::table('user_assets')->insert([
                    'user_id' => $referrer->id,
                    'phone' => $referrer->phone,
                    'total_assets' => $commissionAmount,
                    'used_assets' => 0,
                    'remaining_assets' => $commissionAmount,
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
            }
        }
        
        // Record this one-time payment commission
        DB::table('referral_relationships')->insert([
            'referrer_id' => $directReferrer->referrer_id,
            'referrer_phone' => $directReferrer->referrer_phone,
            'referred_id' => $user->id,
            'referred_phone' => $user->phone,
            'level' => 1,
            'commission_type' => 'payment', // Mark as payment commission
            'payment_amount' => $payment->rupees,
            'bonus_amount' => $commissionAmount,
            'bonus_paid' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
    
    public function reject_payment($id)
    {
        $payment = DB::table('verification_payment_tables')->where('id', $id)->first();
        
        if (!$payment) {
            return redirect()->back()->with('error', 'Payment not found');
        }
        
        DB::table('verification_payment_tables')
            ->where('id', $id)
            ->update([
                'status' => 'rejected',
                'updated_at' => now()
            ]);
        
        return redirect()->back()->with('success', 'Payment rejected successfully!');
    }

    public function withdrawalsPage()
    {
        $withdrawals = DB::table('withdrawals')
            ->orderBy('created_at', 'desc')
            ->get();
        
        $pendingCount = DB::table('withdrawals')->where('status', 'pending')->count();
        $approvedCount = DB::table('withdrawals')->where('status', 'approved')->count();
        $rejectedCount = DB::table('withdrawals')->where('status', 'rejected')->count();
        $totalAmount = DB::table('withdrawals')->where('status', 'approved')->sum('amount');
        
        return view('admin.withdrawals', compact('withdrawals', 'pendingCount', 'approvedCount', 'rejectedCount', 'totalAmount'));
    }

    // ===== WITHDRAWAL APPROVAL WITH RECURRING COMMISSION =====
    public function approveWithdrawal($id)
    {
        $withdrawal = DB::table('withdrawals')->where('id', $id)->first();
        
        if(!$withdrawal) {
            return redirect()->back()->with('error', 'Withdrawal not found');
        }
        
        // Get user assets
        $userAsset = DB::table('user_assets')->where('phone', $withdrawal->user_phone)->first();
        
        if(!$userAsset) {
            return redirect()->back()->with('error', 'User assets not found');
        }
        
        if($userAsset->remaining_assets < $withdrawal->amount) {
            return redirect()->back()->with('error', 'Insufficient assets');
        }
        
        // Update withdrawal status
        DB::table('withdrawals')
            ->where('id', $id)
            ->update([
                'status' => 'approved',
                'approved_by' => session('admin_id'),
                'approved_at' => now(),
                'updated_at' => now()
            ]);
        
        // Deduct from user assets
        DB::table('user_assets')
            ->where('id', $userAsset->id)
            ->update([
                'used_assets' => $userAsset->used_assets + $withdrawal->amount,
                'remaining_assets' => $userAsset->remaining_assets - $withdrawal->amount,
                'updated_at' => now()
            ]);
        
        // ===== PAY COMMISSION ON EVERY WITHDRAWAL =====
        $this->payWithdrawalCommission($withdrawal);
        
        return redirect()->back()->with('success', 'Withdrawal approved successfully and commissions distributed to all upline');
    }

    /**
     * Pay commission on EVERY withdrawal (5%, 3%, 1% based on level)
     */
    private function payWithdrawalCommission($withdrawal)
    {
        // Get the user who made the withdrawal
        $user = DB::table('users_auth_tables')->where('id', $withdrawal->user_id)->first();
        
        if(!$user) return;
        
        // Get ALL upline referrals (everyone who gets commission from this user's withdrawals)
        $uplineReferrals = DB::table('referral_relationships')
            ->where('referred_id', $user->id)
            ->orderBy('level')
            ->get();
        
        if($uplineReferrals->isEmpty()) return;
        
        foreach($uplineReferrals as $ref) {
            // Calculate commission based on level
            $percentage = $this->getWithdrawalPercentage($ref->level);
            if($percentage == 0) continue;
            
            $commissionAmount = ($withdrawal->amount * $percentage) / 100;
            
            if($commissionAmount <= 0) continue;
            
            // Add to referrer's assets
            $referrerAsset = DB::table('user_assets')->where('user_id', $ref->referrer_id)->first();
            
            if($referrerAsset) {
                DB::table('user_assets')
                    ->where('id', $referrerAsset->id)
                    ->update([
                        'total_assets' => $referrerAsset->total_assets + $commissionAmount,
                        'remaining_assets' => $referrerAsset->remaining_assets + $commissionAmount,
                        'updated_at' => now()
                    ]);
            } else {
                $referrer = DB::table('users_auth_tables')->where('id', $ref->referrer_id)->first();
                if($referrer) {
                    DB::table('user_assets')->insert([
                        'user_id' => $referrer->id,
                        'phone' => $referrer->phone,
                        'total_assets' => $commissionAmount,
                        'used_assets' => 0,
                        'remaining_assets' => $commissionAmount,
                        'created_at' => now(),
                        'updated_at' => now()
                    ]);
                }
            }
            
            // Record this withdrawal commission
            DB::table('referral_relationships')->insert([
                'referrer_id' => $ref->referrer_id,
                'referrer_phone' => $ref->referrer_phone,
                'referred_id' => $user->id,
                'referred_phone' => $user->phone,
                'level' => $ref->level,
                'commission_type' => 'withdrawal', // Mark as withdrawal commission
                'payment_amount' => $withdrawal->amount,
                'bonus_amount' => $commissionAmount,
                'bonus_paid' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }

    /**
     * Get withdrawal commission percentage based on level
     */
    private function getWithdrawalPercentage($level)
    {
        switch($level) {
            case 1: return 5;  // Level 1: 5% of every withdrawal
            case 2: return 3;  // Level 2: 3% of every withdrawal
            case 3: return 1;  // Level 3: 1% of every withdrawal
            default: return 0;  // No commission for deeper levels
        }
    }

    public function rejectWithdrawal(Request $request, $id)
    {
        $withdrawal = DB::table('withdrawals')->where('id', $id)->first();
        
        if(!$withdrawal) {
            return redirect()->back()->with('error', 'Withdrawal not found');
        }
        
        DB::table('withdrawals')
            ->where('id', $id)
            ->update([
                'status' => 'rejected',
                'remarks' => $request->remarks ?? 'Rejected by admin',
                'updated_at' => now()
            ]);
        
        return redirect()->back()->with('success', 'Withdrawal rejected');
    }
}