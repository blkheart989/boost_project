<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    // Show login form
    public function showLoginForm()
    {
        return view('admin.auth.login'); // make sure login blade exists
    }

    // Handle login
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        // Fetch admin from DB
        $admin = DB::table('users_auth_tables')
            ->where('email', $request->email)
            ->first();

        // Check password (assuming hashed in DB)
        if ($admin && Hash::check($request->password, $admin->password)) {
            Session::put('admin_id', $admin->id);
            Session::put('admin_name', $admin->name ?? 'Admin');
            Session::put('admin_email', $admin->email);

            return redirect('admins')->with('success', 'Welcome back!');
        }

        return back()->with('error', 'Invalid email or password');
    }

    // Handle logout
    public function logout()
    {
        Session::flush(); // clear all session
        return redirect('admin/login')->with('success', 'Logged out successfully');
    }
}