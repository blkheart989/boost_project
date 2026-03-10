<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class GenerateDailyIncome extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:generate-daily-income';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
{
    $plans = \App\Models\UserPlan::where('status', 'active')->get();

    foreach ($plans as $plan) {

        if ($plan->days_completed < $plan->duration_days) {

            $user = $plan->user;

            // Add income
            $user->wallet_balance += $plan->daily_income;
            $user->save();

            // Increase completed days
            $plan->days_completed += 1;
            $plan->save();
        }

        if ($plan->days_completed >= $plan->duration_days) {
            $plan->status = 'completed';
            $plan->save();
        }
    }

    $this->info('Daily income generated successfully.');
}
}
