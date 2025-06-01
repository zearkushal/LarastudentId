<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // Registration handler
    public function register(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:6',
        ]);

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);

        if ($user) {
            return redirect()->route('login')->with('success', 'Registration successful! Please login.');
        }

        return back()->with('error', 'Registration failed, please try again.');
    }

    // Show login form
    public function login()
    {
        return view('admin.login');
    }

    // Handle login POST request
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate(); // security measure
            return redirect()->route('index');
        }

        return back()->withErrors([
            'email' => 'Invalid email or password.',
        ])->onlyInput('email');
    }

    // Protected dashboard or home page
    public function index()
    {
        if (Auth::check()) {
            return view('Students.index');
        }
        return redirect()->route('login');
    }
     public function logout()
    {
        Auth::logout();
            return view('admin.login');
        
    }
}
