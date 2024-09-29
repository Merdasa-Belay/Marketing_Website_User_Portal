<?php

namespace App\Http\Controllers;

use App\Models\Dataset;
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

            // Get the number of items per page from the request, defaulting to 10
            $perPage = $request->input('per_page', 10);

            // Fetch the paginated datasets
            $datasets = Dataset::paginate($perPage);

            // Pass datasets to the view
            return view('user.datasets', compact('user', 'title', 'datasets'));
        } else {
            // User is not authenticated
            return redirect()->route('login');
        }
    }
}
