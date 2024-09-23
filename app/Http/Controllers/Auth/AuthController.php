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
            'remember' => 'nullable|boolean', // Add this line
        ]);

        // Fetch the customer by email
        $customer = Customer::where('email', $request->email)->first();

        // Check if customer exists and verify password
        if ($customer && Hash::check($request->password, $customer->password)) {
            // Log the customer in with remember option
            Auth::login($customer, $request->remember); // Add the remember parameter

            // Redirect to intended page
            return redirect()->intended('customer.show'); // Ensure this route exists
        }

        // If authentication fails, redirect back with an error message
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }
}
