<?php

namespace App\Http\Controllers;

use App\Models\Dataset;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    // Applying the auth middleware in the constructor


    // Index method for displaying the dashboard
    public function index(Request $request)
    {
        // User is guaranteed to be authenticated here
        $user = $request->user(); // Retrieve the authenticated user
        $title = 'Dashboard';
        $datasets = Dataset::all();

        // Pass the user and title to the view
        return view('user.dashboard', compact('user', 'title', 'datasets'));
    }
}
