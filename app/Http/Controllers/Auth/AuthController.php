<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{
    //

    // Show registration form
    public function registration()
    {
        return view('auth.register');
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        // Validate the request
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'remember' => 'nullable|boolean',
        ]);

        // Specify the correct guard (if using a custom guard, e.g., 'customer')
        $credentials = $request->only('email', 'password');

        // Attempt to log the customer in with the provided credentials and remember option
        if (Auth::guard('customer')->attempt($credentials, $request->remember)) {
            // Get the authenticated customer
            $customer = Auth::guard('customer')->user();

            // Redirect to the intended page or to the customer dashboard
            return redirect()->intended(route('customers.dashboard', ['customer' => $customer->id]));
        }

        // Redirect back with an error message if credentials are invalid
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->withInput($request->only('email')); // Preserves the email input
    }
}
