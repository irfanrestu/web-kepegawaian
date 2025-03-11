<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function postlogin(Request $request)
    {
        // Validate the request data
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ], [
            'email.required' => 'The email field is required.',
            'email.email' => 'The email must be a valid email address.',
            'password.required' => 'The password field is required.',
            'password.min' => 'The password must be at least 6 characters.',
        ]);

        // Attempt to authenticate the user
        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect('/dashboard'); // Redirect to dashboard on successful login
        }

        // Redirect back to login with error message if authentication fails
        return redirect('/login')->withErrors([
            'email' => 'Email / Password Tidak Sesuai.',
        ]);
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}