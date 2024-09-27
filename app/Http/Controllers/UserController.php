<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\Customer;
use App\Http\Requests\CustomerRequest; // Ensure to import your CustomerRequest
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Auth\AuthController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $user = User::all();
        return view('user.detail', compact('user'));
    }


    public function show(User $user)
    {
        $title = 'Detail';
        return view('user.detail', compact('user', 'title'));
    }

    // update the user details


    public function update(RegisterRequest $request, User $user)
    {
        $user->update([
            'title' => $request->title,
            'fullname' => $request->fullname,
            'country' => $request->country,
            'phone' => $request->phone,
            'email' => $request->email,
            'password' => bcrypt($request->password), // Hash the password
        ]);

        return redirect()->route('detail.show', ['user' => $user->id])
            ->with('success', 'User updated successfully!');
    }



    // update the user password

    public function updatePassword(Request $request, $id)
    {
        // Validate the request
        $request->validate([
            'currentpassword' => 'required',
            'newpassword' => 'required|min:8|confirmed',
        ]);

        // Find the customer
        $customer = User::findOrFail($id);

        // Check if the current password is correct
        if (!Hash::check($request->currentpassword, $customer->password)) {
            // Redirect back with an error message
            return redirect()->back()->withErrors(['currentpassword' => 'Current password is incorrect.']);
        }

        // Update the password
        $customer->password = Hash::make($request->newpassword);
        $customer->save();

        return redirect()->back()->with('success', 'Password updated successfully.');
    }
}