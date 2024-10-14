<?php

namespace App\Http\Controllers;

use App\Models\Dataset;
use App\Models\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DatasetController extends Controller
{
    public function index(Request $request)
    {
        if ($request->user()) {
            $user = $request->user(); // Retrieve the authenticated user
            $title = 'Subscribed Datasets'; // Title for the view

            // Get the number of items per page from the request, defaulting to 10
            $perPage = $request->input('per_page', 10);

            // Get subscribed dataset IDs for the authenticated user
            $subscribedDatasetIds = Subscription::where('user_id', $user->id)->pluck('dataset_id')->toArray();

            // Fetch all datasets (or the datasets you want to show)
            $datasets = Dataset::all();

            // Pass datasets and subscribedDatasetIds to the view
            return view('user.datasets', compact('user', 'title', 'datasets', 'subscribedDatasetIds'));
        } else {
            // User is not authenticated
            return redirect()->route('login');
        }
    }
}
