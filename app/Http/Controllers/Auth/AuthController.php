<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
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

    public function login()
    {
        return view('auth.login');
    }

    public function registrationPost(Request $request)
    {
        $title = $request->title;
        $fullname = $request->fullname;
        $country = $request->country;
        $phone = $request->phone;
        $email = $request->email;
        $password = Hash::make($request->password);

        $user = User::create([
            'title' => $title,
            'fullname' => $fullname,
            'country' => $country,
            'phone' => $phone,
            'email' => $email,
            'password' => $password
        ]);
    }
}
