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
            $perPage = $request->input('per_page', 12);

            // Get the subscribed datasets for the authenticated user
            $subscribedDatasets = $user->subscriptions()->with('dataset')->get()->pluck('dataset');
            // Get subscribed dataset IDs
            $subscribedDatasetIds = $subscribedDatasets->pluck('id')->toArray();


            // Fetch all datasets (or the datasets you want to show)
            $datasets = Dataset::paginate($perPage);
            $isDataset = true;


            // Pass datasets and subscribedDatasetIds to the view
            return view('user.datasets', compact('user', 'title', 'datasets', 'subscribedDatasetIds', 'isDataset', 'subscribedDatasets'));
        } else {
            // User is not authenticated
            return redirect()->route('login');
        }
    }
}