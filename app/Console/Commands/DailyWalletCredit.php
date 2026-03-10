<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class DailyWalletCredit extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'wallet:daily-credit';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Credit daily earnings to users from active plans';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Starting daily wallet credit...');
        
        // Get current date
        $today = date('Y-m-d');
        
        // Find all active plans (status = 1 means active)
        $activePlans = DB::table('user_plans')
            ->where('status', 1)
            ->get();
        
        $creditedCount = 0;
        $completedCount = 0;
        
        foreach($activePlans as $plan) {
            // Check if plan is still within duration
            if($plan->days_completed >= $plan->duration_days) {
                // Mark as expired
                DB::table('user_plans')
                    ->where('id', $plan->id)
                    ->update(['status' => 0]);
                
                $this->line("Plan ID {$plan->id} completed and expired");
                $completedCount++;
                continue;
            }
            
            // Check if already credited today
            $alreadyCredited = DB::table('daily_wallet')
                ->where('user_plan_id', $plan->id)
                ->where('credit_date', $today)
                ->exists();
            
            if($alreadyCredited) {
                $this->line("Plan ID {$plan->id} already credited today");
                continue;
            }
            
            $dailyIncome = $plan->daily_income;
            
            // Update the plan
            DB::table('user_plans')
                ->where('id', $plan->id)
                ->update([
                    'days_completed' => $plan->days_completed + 1,
                    'total_earned' => $plan->total_earned + $dailyIncome,
                    'status' => ($plan->days_completed + 1 >= $plan->duration_days) ? 0 : 1
                ]);
            
            // Record in daily_wallet table
            DB::table('daily_wallet')->insert([
                'user_id' => $plan->user_id,
                'user_plan_id' => $plan->id,
                'amount_credited' => $dailyIncome,
                'credit_date' => $today,
                'status' => 'credited',
                'created_at' => now(),
                'updated_at' => now()
            ]);
            
            $this->line("✓ Credited ₹{$dailyIncome} to Plan ID {$plan->id} (Day " . ($plan->days_completed + 1) . "/{$plan->duration_days})");
            $creditedCount++;
        }
        
        $this->info("Daily wallet credit completed!");
        $this->info("Plans credited: {$creditedCount}");
        $this->info("Plans completed: {$completedCount}");
        
        return Command::SUCCESS;
    }
}