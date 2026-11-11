<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;    
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
        // Display Login Page
    public function index()
    {
        return view('login');
    }

    // Handle Login Form
    public function store(Request $request)
    {
        // 1. Validation
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8'
        ]);

        // 2. Authentication
        if (!Auth::attempt($validated)) {

            return back()->withErrors([
                'email' => 'Email or Password is incorrect.'
            ])->onlyInput('email');

        }

        // 3. Regenerate Session
        // عند نجاح تسجيل الدخول، نجدد Session ID.
        // هذا إجراء أمني يساعد على الحماية من Session Fixation Attacks.
        $request->session()->regenerate();

        // 4. Redirect
         return redirect()
         ->route('home')
         ->with('success', 'Project created successfully.');
    }
        // Handle Logout
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login');
    }


}
