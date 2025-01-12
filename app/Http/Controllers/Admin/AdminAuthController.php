<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;

class AdminAuthController extends Controller
{
    public function showRegisterForm()
    {
        return view('admin.auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'username' => 'required|string|unique:admins,username',
            'password' => 'required|min:6|confirmed',
        ]);
        
        // password hashed from model
        Admin::create([
            'username' => $request->username,
            'password' => $request->password,
        ]);

        return redirect()->route('admin.login')->with('success', 'Registration successful! Please log in.');
    }

    public function showLoginForm()
    {
        return view('admin.auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        if (Auth::guard('admin')->attempt($credentials)) {
            $request->session()->regenerate();

            $admin = Auth::guard('admin')->user();
            session([
                'admin_id' => $admin->id,
                'admin_username' => $admin->username,
            ]);

            return redirect()->route('admin.index')->with('success', 'Login successful!');
        }

        return back()->withErrors(['error' => 'Invalid credentials']);
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();

        return redirect()->route('admin.login')->with('success', 'Logged out successfully.');
    }
}
