<?php
// app/Helpers/WalletHelper.php
namespace App\Helpers;

use Illuminate\Support\Facades\DB;

class WalletHelper
{
    /**
     * Get user wallet balance
     */
    public static function getBalance($userId)
    {
        $wallet = DB::table('wallets')->where('user_id', $userId)->first();
        
        if (!$wallet) {
            // Create wallet if not exists
            DB::table('wallets')->insert([
                'user_id' => $userId,
                'balance' => 0,
                'created_at' => now(),
                'updated_at' => now()
            ]);
            return 0;
        }
        
        return $wallet->balance;
    }

    /**
     * Add money to wallet (Credit)
     */
    public static function credit($userId, $amount, $description, $referenceType = null, $referenceId = null)
    {
        DB::beginTransaction();
        
        try {
            // Get or create wallet
            $wallet = DB::table('wallets')->where('user_id', $userId)->first();
            
            if (!$wallet) {
                DB::table('wallets')->insert([
                    'user_id' => $userId,
                    'balance' => $amount,
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
            } else {
                // Update balance
                DB::table('wallets')
                    ->where('user_id', $userId)
                    ->update([
                        'balance' => $wallet->balance + $amount,
                        'updated_at' => now()
                    ]);
            }

            // Create transaction record
            $transactionId = DB::table('wallet_transactions')->insertGetId([
                'user_id' => $userId,
                'type' => 'credit',
                'amount' => $amount,
                'description' => $description,
                'reference_type' => $referenceType,
                'reference_id' => $referenceId,
                'created_at' => now(),
                'updated_at' => now()
            ]);

            DB::commit();
            return $transactionId;
            
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }
    }
}