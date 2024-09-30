<?php

namespace App\Http\Controllers;

use App\Models\Dataset;
use App\Models\Subscription;
use Illuminate\Http\Request;

class DatasetController extends Controller
{
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

    public function store(Request $request)
    {
        // Validate request data
        $request->validate([
            'name' => 'required|string|max:255',
            // Add other validation rules as needed
        ]);

        // Create the dataset
        $dataset = Dataset::create([
            'name' => $request->name,
            'user_id' => $request->user()->id,
            // Add other dataset fields
        ]);

        // Increment the user's active subscription count
        $subscription = Subscription::where('user_id', $request->user()->id)->first();

        if ($subscription) {
            $subscription->increment('active_count'); // Increment the active dataset count
        } else {
            // Optionally, create a new subscription if one doesn't exist
            Subscription::create([
                'user_id' => $request->user()->id,
                'active_count' => 1, // Start with 1 active dataset
            ]);
        }

        // Redirect or return response
        return redirect()->route('dataset')->with('success', 'Dataset added successfully.');
    }
}
