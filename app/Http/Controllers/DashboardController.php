<?php

namespace App\Http\Controllers;

use App\Models\Dataset;
use App\Models\Subscription;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DashboardController extends Controller
{
    // Index method for displaying the dashboard
    public function index(Request $request)
    {
        if ($request->user()) {
            // User is authenticated
            $user = $request->user(); // Retrieve the authenticated user
            $title = 'Dashboard';

            // Set the number of items per page 
            $perPageTransaction = 12;
            $perPageSubscription = 4;



            // Fetch the subscribed datasets with their details

            $datasetsCount = Dataset::count();

            // Get the subscribed datasets for the authenticated user
            $subscribedDatasets = $user->subscriptions()->with('dataset')->get()->pluck('dataset');
            // Get subscribed dataset IDs
            $subscribedDatasetIds = $subscribedDatasets->pluck('id')->toArray();

            // Set the flag to false for the dashboard
            $isDataset = false;

            $subscriptionCount = $subscribedDatasets->count(); // Get count from paginated results
            // Fetch only the subscribed datasets

            $datasets = Dataset::whereIn('id', $subscribedDatasetIds)->paginate($perPageSubscription);

            // Fetch the paginated transactions for the authenticated user
            $transactions = Transaction::paginate($perPageTransaction)->map(function ($transaction) {
                $transaction->date = Carbon::parse($transaction->date);
                return $transaction;
            });

            // Pass datasets and their count to the view
            return view('user.dashboard', compact(
                'user',
                'title',
                'subscribedDatasets',
                'subscriptionCount',
                'datasetsCount',
                'transactions',
                'isDataset',
                'subscribedDatasetIds',
                'datasets'

            ));
        } else {
            // User is not authenticated
            return redirect()->route('login');
        }
    }
}
