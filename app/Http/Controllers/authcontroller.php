<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Hash;
use DB;

class authcontroller extends Controller
{
    // Show registration form
    public function auth_page(){
        return view('auth.solar_auth');
    }

    // Show login form
    public function login_page()
    {
        return view('auth.solar_auth');
    }

    // Show registration form (for referral links)
    public function showRegistrationForm()
    {
        return view('auth.solar_auth');
    }

    // Process registration
    public function auth_insert(Request $request){
        $request->validate([
            'name'       => 'required|string|max:255',
            'email'      => 'required|email|unique:users_auth_tables,email',
            'phone'      => 'required|digits:10|unique:users_auth_tables,phone',
            'password'   => 'required|string|min:6|confirmed',
            'referral_code' => 'nullable|string|max:20'
        ]);
        
        // Generate unique referral code for new user
        $referralCode = strtoupper(substr($request->name, 0, 3)) . rand(1000, 9999);
        
        // Check if referral code exists
        while(DB::table('users_auth_tables')->where('referral_code', $referralCode)->exists()) {
            $referralCode = strtoupper(substr($request->name, 0, 3)) . rand(1000, 9999);
        }
        
        // Find who referred this user
        $referredBy = null;
        $referrer = null;
        
        if($request->referral_code) {
            $referrer = DB::table('users_auth_tables')
                ->where('referral_code', $request->referral_code)
                ->first();
            if($referrer) {
                $referredBy = $referrer->referral_code;
            }
        }
        
        // Insert new user
        $userId = DB::table('users_auth_tables')->insertGetId([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => $request->password,
            'referral_code' => $referralCode,
            'referred_by' => $referredBy,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        
        // ===== CREATE REFERRAL RELATIONSHIP =====
        if($referrer) {
            // Level 1 referral (direct)
            DB::table('referral_relationships')->insert([
                'referrer_id' => $referrer->id,
                'referrer_phone' => $referrer->phone,
                'referred_id' => $userId,
                'referred_phone' => $request->phone,
                'level' => 1,
                'payment_amount' => 0,
                'bonus_amount' => 0,
                'bonus_paid' => 0,
                'created_at' => now(),
                'updated_at' => now()
            ]);
            
            // Create higher level referrals (if referrer was referred by someone)
            $this->createHigherLevelReferrals($referrer->id, $userId, $request->phone, 2);
        }
        
        return redirect('login')->with('success', 'Registration successful! Your referral code: ' . $referralCode);
    }

    /**
     * Create higher level referral relationships (Level 2, 3, 4, etc.)
     */
    private function createHigherLevelReferrals($referrerId, $referredId, $referredPhone, $level)
    {
        // Find if referrer was referred by someone
        $referrer = DB::table('users_auth_tables')->where('id', $referrerId)->first();
        
        if(!$referrer || !$referrer->referred_by) return;
        
        // Find the upline referrer
        $upline = DB::table('users_auth_tables')
            ->where('referral_code', $referrer->referred_by)
            ->first();
        
        if($upline) {
            DB::table('referral_relationships')->insert([
                'referrer_id' => $upline->id,
                'referrer_phone' => $upline->phone,
                'referred_id' => $referredId,
                'referred_phone' => $referredPhone,
                'level' => $level,
                'payment_amount' => 0,
                'bonus_amount' => 0,
                'bonus_paid' => 0,
                'created_at' => now(),
                'updated_at' => now()
            ]);
            
            // Recursively create higher levels (up to 5)
            if($level < 5) {
                $this->createHigherLevelReferrals($upline->id, $referredId, $referredPhone, $level + 1);
            }
        }
    }

    // Process login
    public function login(Request $request){
        // Validate
        $request->validate([
            'phone' => 'required|digits:10',
            'password' => 'required'
        ]);
        
        // Check user by phone number
        $user = DB::table('users_auth_tables')->where('phone', $request->phone)->first();
        
        if($user && $user->password === $request->password) {
            session([
                'user_id' => $user->id,
                'user_name' => $user->name,
                'user_email' => $user->email,
                'user_phone' => $user->phone,
                'user_referral_code' => $user->referral_code
            ]);
            
            return redirect('user/dashboard')->with('success', 'Logged in successfully');
        }
        
        return back()->with('error', 'Invalid phone or password')->withInput();
    }

    // Logout
    public function logout(){
        session()->flush();
        return redirect('login')->with('success', 'Logged out successfully');
    }

    // Buy plan with assets
    public function buyPlanWithAssets(Request $request)
    {
        $planId = $request->plan_id;
        $userPhone = session('user_phone');
        $userId = session('user_id');
        
        if(!$userId) {
            return response()->json(['success' => false, 'message' => 'Please login first'], 401);
        }
        
        // Get plan details
        $plan = DB::table('plans')->where('id', $planId)->first();
        
        if (!$plan) {
            return response()->json(['success' => false, 'message' => 'Plan not found']);
        }
        
        // Get user assets
        $userAsset = DB::table('user_assets')->where('phone', $userPhone)->first();
        
        if (!$userAsset) {
            return response()->json(['success' => false, 'message' => 'No assets found. Please make a payment first.']);
        }
        
        // Check if user has enough assets
        if ($userAsset->remaining_assets < $plan->price) {
            return response()->json([
                'success' => false, 
                'message' => 'Insufficient assets. Need ₹' . number_format($plan->price - $userAsset->remaining_assets) . ' more.'
            ]);
        }
        
        // Insert into user_plans
        DB::table('user_plans')->insert([
            'user_id' => $userId,
            'phone' => $userPhone,
            'plan_id' => $plan->id,
            'daily_income' => $plan->daily_income,
            'duration_days' => $plan->duration_days,
            'days_completed' => 0,
            'total_earned' => 0,
            'status' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        
        // Update user assets
        DB::table('user_assets')
            ->where('id', $userAsset->id)
            ->update([
                'used_assets' => $userAsset->used_assets + $plan->price,
                'remaining_assets' => $userAsset->remaining_assets - $plan->price,
                'updated_at' => now()
            ]);
        
        return response()->json([
            'success' => true, 
            'message' => 'Plan purchased successfully! Daily earnings will start from tomorrow.',
            'remaining_assets' => $userAsset->remaining_assets - $plan->price
        ]);
    }

    // Withdraw request
    public function withdrawRequest(Request $request)
    {
        $userId = session('user_id');
        $userPhone = session('user_phone');
        $userName = session('user_name');
        
        if(!$userId) {
            return response()->json(['success' => false, 'message' => 'Please login first']);
        }
        
        // Validate
        $request->validate([
            'amount' => 'required|numeric|min:150',
            'account_holder' => 'required_without:upi_id',
            'account_number' => 'required_without:upi_id',
            'ifsc_code' => 'required_without:upi_id',
            'upi_id' => 'required_without_all:account_number,account_holder,ifsc_code'
        ]);
        
        // Get user assets
        $userAsset = DB::table('user_assets')->where('phone', $userPhone)->first();
        
        if(!$userAsset) {
            return response()->json(['success' => false, 'message' => 'No assets found']);
        }
        
        if($userAsset->remaining_assets < $request->amount) {
            return response()->json(['success' => false, 'message' => 'Insufficient assets']);
        }
        
        // Check if user already has pending withdrawal
        $pendingWithdrawal = DB::table('withdrawals')
            ->where('user_id', $userId)
            ->where('status', 'pending')
            ->first();
        
        if($pendingWithdrawal) {
            return response()->json(['success' => false, 'message' => 'You already have a pending withdrawal request']);
        }
        
        // Create withdrawal record
        DB::table('withdrawals')->insert([
            'user_id' => $userId,
            'user_phone' => $userPhone,
            'user_name' => $userName,
            'amount' => $request->amount,
            'account_holder' => $request->account_holder,
            'account_number' => $request->account_number,
            'ifsc_code' => $request->ifsc_code,
            'upi_id' => $request->upi_id,
            'payment_method' => $request->upi_id ? 'upi' : 'bank',
            'status' => 'pending',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        
        return response()->json([
            'success' => true, 
            'message' => 'Withdrawal request submitted successfully! It will be processed after admin approval.'
        ]);
    }
}