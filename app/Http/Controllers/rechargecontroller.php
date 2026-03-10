<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class RechargeController extends Controller
{
    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'amount' => 'required|numeric|min:1',
            'utr_number' => 'required|string',
            'screenshot' => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        // Handle file upload
        $imagePath = null;
        if ($request->hasFile('screenshot')) {
            $imagePath = $request->file('screenshot')->store('payments', 'public');
        }

        // Insert into payment_verifications table
        DB::table('payment_verifications')->insert([
            'user_id' => Auth::id() ?? 1, // Replace with Auth::id() when auth is ready
            'plan_id' => null,
            'email' => auth()->user()->email ?? 'user@example.com',
            'number' => auth()->user()->phone ?? '0000000000',
            'rupees' => $request->amount,
            'utr_number' => $request->utr_number,
            'image' => $imagePath,
            'message' => $request->message ?? 'Recharge request',
            'status' => 'pending',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        return redirect()->back()->with('success', 'Recharge request submitted successfully! Admin will verify it soon.');
    }
}