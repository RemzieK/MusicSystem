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
        $this->middleware('auth')->only('logout');
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
        return view('create');
    }

    public function login(Request $request)
    {
        // Validate the login form request
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
    
        // Retrieve the user with the entered email
        $user = User::where('email', $request->email)->first();
    
        // Check if the user exists and the entered password is correct
        if ($user && Hash::check($request->password, $user->password)) {
            // Log the user in
            Auth::login($user);
    
            // Redirect to the index page
            return redirect('/');
        }
    
        // If the credentials are not correct, redirect back with an error message
        return back()->with('error', 'The provided credentials do not match our records.');
    }
    

    public function logout()
    {
        
        Auth::logout();


        return redirect('/');
    }
}
