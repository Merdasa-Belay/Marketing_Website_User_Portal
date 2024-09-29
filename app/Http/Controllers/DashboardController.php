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
        if ($request->user()) {
            // User is authenticated
            $user = $request->user(); // Retrieve the authenticated user
            $title = 'Dashboard';

            // Set the number of items per page to 4
            $perPage = 4;

            // Fetch the paginated datasets for the authenticated user
            $datasets = Dataset::where('user_id', $user->id)->paginate($perPage);

            // Get the total count of datasets for the authenticated user
            $datasetsCount = Dataset::where('user_id', $user->id)->count();

            // Pass datasets and their count to the view
            return view('user.dashboard', compact('user', 'title', 'datasets', 'datasetsCount'));
        } else {
            // User is not authenticated
            return redirect()->route('login');
        }
    }
}
