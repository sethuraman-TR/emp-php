<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
      // Register page
    public function register()
    {
        return view('auth.register');
    }

    // Store register data
    public function registerStore(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'is_admin' => 0,
        ]);

        Auth::login($user);

        $request->session()->regenerate();

        return redirect()->route('dashboard')
            ->with('success', 'Registration successful!');
    }

    // Login page
    public function login()
    {
        return view('auth.login');
    }

    // Login authentication
    public function loginStore(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {

            $request->session()->regenerate();

            if (Auth::user()->is_admin == 1) {
                return redirect()->route('admin.dashboard');
            }

            return redirect()->route('dashboard');
        }

        return back()->withErrors([
            'email' => 'Invalid email or password.',
        ])->onlyInput('email');
    }

    // Normal user dashboard
    public function dashboard()
    {
        return view('dashboard');
    }

    // Admin dashboard
    public function adminDashboard()
    {
        return view('admin.dashboard');
    }

    // Logout
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
