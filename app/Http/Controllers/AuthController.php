<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('AdminLogin.index');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            if (Auth::user()->role === 'admin') {
                return redirect()->route('Admin.home');
            } else {
                Auth::logout();
                return redirect()->back()->withErrors(['email' => 'Access denied for non-admin user.']);
            }
        }

        return redirect()->back()->withErrors(['email' => 'Invalid credentials.']);
    }
}
