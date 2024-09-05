<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerRequest;
use App\Models\Customer;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{
    // Display the registration form
    public function registration_page()
    {
        return view('auth.register');
    }

    // Display the login form
    public function login_page()
    {
        return view('auth.login');
    }


    // Store a new user

    // Store a new customer


    public function store(CustomerRequest $request)
    {
        // Create a new user with the validated data
        $customer = Customer::create($request->validated());

        // Check if the user was created successfully and redirect
        if ($customer) {
            return redirect()->route('auth.login')->with('success', 'Account created successfully! Please log in.');
        }

        // If user creation fails, redirect with an error message
        return redirect()->route('auth.register')->with('error', 'Failed to create account. Please try again.');
    }
    public function user_detail($customerId)
    {
        $title = 'user detail';
        $customer = Customer::findOrFail($customerId);
        return view('profile.detail', compact('customer', 'title'));
    }
}
