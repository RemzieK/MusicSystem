<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminAuthController extends Controller
{
    public function __construct()
{
    $this->middleware('auth')->except(['index', 'show']);
}


    public function showRegistrationForm()
    {
        return view('author');
    }

    public function register(Request $request)
{
    
    $request->validate([
        'name' => 'required',
        'email' => 'required|email|unique:users',
        'password' => 'required|confirmed',
    ]);

 
    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
    ]);

  
    if (!$user) {
        return back()->with('error', 'Registration failed. Please try again.');
    }

  
    session(['user' => $user]);

    
    return redirect()->route('author');
}

    public function showLoginForm()
    {
        return view('create');
    }

    public function login(Request $request)
{
   
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

   
    $user = User::where('email', $request->email)->first();

    
    if ($user && Hash::check($request->password, $user->password)) {
        
        session(['user' => $user]);

        
        return redirect()->route('create');
    }

    return back()->with('error', 'The provided credentials do not match our records.');
}

    public function logout()
    {
        
        session()->forget('user');

        return redirect()->route('index');
    }
}
