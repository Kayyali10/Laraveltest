<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class ReigesterController extends Controller
{
     // Display Register Page
    public function index()
    {
        return view("register");
    }

    // Handle Register Form
    public function store(Request $request)
    {
        // 1. Validation
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
        ]);

        // 2. Create User
       User::create([
            'name'=> $validated['name'],
            'email'=> $validated['email'],
            'password'=> $validated['password']
       ]);

               // 3. Redirect
         return redirect('/login')->with(
            'success',
            'Your account has been created successfully!'
         );

    }

}
