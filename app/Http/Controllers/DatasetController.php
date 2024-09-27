<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DatasetController extends Controller
{
    //
    public function index(Request $request)
    {
        if ($request->user()) {
            // User is authenticated
            $user = $request->user(); // Retrieve the authenticated user
            $title = 'Dataset';
            return view('user.datasets', compact('user', 'title'));
        } else {
            // User is not authenticated
            return redirect()->route('login');
        }
    }
}