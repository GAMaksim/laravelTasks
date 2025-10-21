<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Register form ko'rsatish
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    // Register qilish
    public function register(Request $request)
    {
        // Validation
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ], [
            'name.required' => 'Ism kiritish majburiy!',
            'email.required' => 'Email kiritish majburiy!',
            'email.email' => 'Email formati noto\'g\'ri!',
            'email.unique' => 'Bu email allaqachon ro\'yxatdan o\'tgan!',
            'password.required' => 'Parol kiritish majburiy!',
            'password.min' => 'Parol kamida 8 ta belgidan iborat bo\'lishi kerak!',
            'password.confirmed' => 'Parollar mos kelmadi!',
        ]);

        // User yaratish
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Avtomatik login qilish
        Auth::login($user);

        return redirect('/')->with('success', '✅ Ro\'yxatdan o\'tdingiz!');
    }

    // Login form ko'rsatish
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Login qilish
    public function login(Request $request)
    {
        // Validation
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ], [
            'email.required' => 'Email kiritish majburiy!',
            'email.email' => 'Email formati noto\'g\'ri!',
            'password.required' => 'Parol kiritish majburiy!',
        ]);

        // Login attempt
        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();

            return redirect()->intended('/')->with('success', '✅ Tizimga kirdingiz!');
        }

        return back()->withErrors([
            'email' => 'Email yoki parol noto\'g\'ri!',
        ])->onlyInput('email');
    }

    // Logout
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('success', '👋 Tizimdan chiqdingiz!');
    }
}