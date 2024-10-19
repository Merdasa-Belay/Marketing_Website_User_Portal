<?php

namespace App\Http\Controllers;

use App\Models\Dataset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DatasetController extends Controller
{
    public function index(Request $request)
    {
        if ($request->user()) {
            $user = $request->user(); // Retrieve the authenticated user
            $title = 'All Datasets'; // Default title for the view

            // Get the number of items per page from the request, defaulting to 12
            $perPage = $request->input('per_page', 12);

            // Fetch all datasets
            $datasets = Dataset::paginate($perPage);

            // Fetch subscribed datasets for the authenticated user
            $subscribedDatasets = $user->subscriptions()->with('dataset')->get()->pluck('dataset');
            $subscribedDatasetIds = $subscribedDatasets->pluck('id')->toArray();

            // Check if the request is for subscribed datasets
            $isSubscribed = $request->routeIs('dataset.subscribed');

            // If showing only subscribed datasets, adjust the title and datasets collection
            if ($isSubscribed) {
                $title = 'Subscribed Datasets';
                $datasets = $subscribedDatasets; // Use subscribed datasets instead of all datasets
            }

            // Pass datasets and subscribed information to the view
            return view('user.datasets', compact('user', 'title', 'datasets', 'subscribedDatasetIds', 'isSubscribed'));
        } else {
            // User is not authenticated, redirect to login
            return redirect()->route('login');
        }
    }
}