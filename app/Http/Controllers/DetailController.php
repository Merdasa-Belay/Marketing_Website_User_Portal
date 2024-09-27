<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class DetailController extends Controller
{



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

        ]);


        return redirect()->route('detail.show', ['user' => $user->id])
            ->with('success', 'User updated successfully!');
    }



    // update the user password

    public function updatePassword(Request $request, User $user) // Use Route Model Binding
    {
        // Validate the request
        $request->validate([
            'currentpassword' => 'required',
            'newpassword' => 'required|min:8|confirmed',
        ]);

        // Check if the current password is correct
        if (!Hash::check($request->currentpassword, $user->password)) {
            // Redirect back with an error message
            return redirect()->back()->withErrors(['currentpassword' => 'Current password is incorrect.']);
        }

        // Update the password
        $user->password = Hash::make($request->newpassword);
        $user->save();

        // Redirect to a specific route after successful update
        return redirect()->route('detail.show', ['user' => $user->id])
            ->with('success', 'Password updated successfully.');
    }



    public function uploadProfilePicture(Request $request)
    {
        // Check if the user is authenticated
        if ($user = $request->user()) {
            // Validate the request
            $request->validate([
                'profile_picture' => 'required|image',
            ]);

            // Handle the file upload
            $profilePicture = $request->file('profile_picture');
            $filename = time() . '.' . $profilePicture->getClientOriginalExtension();
            $profilePicture->move(public_path('assets/profile_pic'), $filename);

            // Update the user's profile picture
            $user->update(['profile_picture' => $filename]);

            // Redirect back with a success message
            return redirect()->back()->with('success', 'Profile picture updated successfully!');
        } else {
            // User is not authenticated
            return redirect()->route('login')->withErrors('You need to be logged in to upload a profile picture.');
        }
    }
}