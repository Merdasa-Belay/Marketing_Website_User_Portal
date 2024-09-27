<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register()
    {
        //  (Registration view)
        return view("auth.register");
    }

    public function registerPost(RegisterRequest $request)
    {
        $validated = $request->validated();
        $validated['password'] = Hash::make($validated['password']);
        $user = User::create($validated);
        Auth::login($user);
        return redirect()->route('detail.show', ['user' => $user->id]);
    }

    public function login()
    {
        return view("auth.login");
    }


    public function loginPost(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // Attempt to log in the user
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // Get the authenticated user
            $user = Auth::user();

            // Redirect to the user detail page with the user ID
            return redirect()->route('detail.show', ['user' => $user->id]);
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }


    public function logout(Request $request)
    {
        // Log the user out
        Auth::logout();

        // Invalidate the user's session to prevent session fixation attacks
        $request->session()->invalidate();

        // Regenerate a new session token to prevent CSRF attacks
        $request->session()->regenerateToken();

        // Redirect to the homepage or login page after logging out
        return redirect()->route('login')->with('success', 'You have been logged out.');
    }
}