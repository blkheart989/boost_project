<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('admin.auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        $admin = DB::table('admin_tables')
            ->where('email', $request->email)
            ->first();

        if (!$admin) {
            return back()->with('error','Email not found');
        }

        if (Hash::check($request->password, $admin->password)) {

            Session::put('admin_id', $admin->id);
            Session::put('admin_name', $admin->name ?? 'Admin');
            Session::put('admin_email', $admin->email);

            return redirect('admins')->with('success','Welcome back!');
        }

        return back()->with('error','Wrong password');
    }

    public function logout()
    {
        Session::flush();
        return redirect('admin/login')->with('success','Logged out successfully');
    }
}