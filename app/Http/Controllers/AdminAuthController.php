<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AdminAuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only('logout','delete','create','store','edit','update','uploadNew');
    }

    public function showRegistrationForm()
    {
        return view('author');
    }

    public function register(Request $request)
{
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users|max:255',
        'password' => 'required|string|min:8',
    ]);
    
    $user = User::create([
        'name' => $request->input('name'),
        'email' => $request->input('email'),
        'password' => bcrypt($request->input('password')),
    ]);

    if (!$user) {
        
        return back()->with('error', 'Registration failed. Please try again.');
    } 

    Auth::login($user);

    return redirect('/');
}

    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
    
        $user = User::where('email', $request->email)->first();
    
        if ($user && Hash::check($request->password, $user->password)) {
    
            Auth::login($user);
    
            return redirect('/');
        }
    
        return back()->with('error', 'The provided credentials do not match our records.');
    }

    public function logout()
    {
        Auth::logout();

        return redirect('/');
    }
}
