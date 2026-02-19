<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    // Menampilkan form login admin
    public function showLoginForm()
    {
        return view('auth.admin-login');
    }

    // Proses login admin
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        // Validasi kredensial admin
        if (Auth::attempt($credentials)) {
            if (auth()->user()->role === 'admin') {
                return redirect()->route('admin.dashboard');
            } else {
                Auth::logout();
                return redirect()->route('admin.login')->withErrors('You are not authorized to access the admin area.');
            }
        }

        return redirect()->route('admin.login')->withErrors('Invalid credentials.');
    }

    // Menampilkan dashboard admin
    public function dashboard()
    {
        return view('admin.dashboard');
    }
}
