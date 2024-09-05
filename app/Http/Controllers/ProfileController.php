<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Http\Requests\CustomerRequest;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{





    public function show(Customer $customer)
    {
        return view('profile.detail', compact('customer'));
    }





    // Update user profile
    public function update(CustomerRequest $request, Customer $customer)
    {
        // Validate and get the data from the request
        $validatedData = $request->validated();

        // Remove the 'confirmpassword' field if present
        unset($validatedData['confirmpassword']);

        // Handle password hashing
        if (isset($validatedData['password']) && !empty($validatedData['password'])) {
            $validatedData['password'] = bcrypt($validatedData['password']);
        } else {
            // Remove the password field if it's not provided
            unset($validatedData['password']);
        }

        // Update the customer with the validated data
        $updateSuccessful = $customer->update($validatedData);

        // Redirect based on the update result
        if ($updateSuccessful) {
            return redirect()->route('profile.show')->with('success', 'Profile updated successfully!');
        }

        return redirect()->route('profile.show')->with('error', 'Failed to update profile. Please try again.');
    }
}
