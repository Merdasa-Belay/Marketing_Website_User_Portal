<?php

namespace App\Http\Controllers;

use App\Models\Dataset;
use App\Models\Subscription;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Carbon\Carbon;

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

            // Set the number of items per page 
            $perPageDataset = 4;
            $perPageTransaction = 10;
            $perPageSubscription = 10;



            // Fetch the paginated datasets for the authenticated user
            $datasets = Dataset::where('user_id', $user->id)->paginate($perPageDataset);

            // Get the total count of datasets for the authenticated user
            $datasetsCount = Dataset::where('user_id', $user->id)->count();

            $transactions = Transaction::paginate($perPageTransaction)->map(function ($transaction) {
                $transaction->date = Carbon::parse($transaction->date);
                return $transaction;
            });

            $subscriptions = Subscription::where('user_id', $user->id)->paginate($perPageSubscription);
            $subscriptionCount = Subscription::where('user_id', $user->id)->count();

            // Pass datasets and their count to the view
            return view('user.dashboard', compact('user', 'title', 'datasets', 'datasetsCount', 'transactions', 'subscriptions', 'subscriptionCount'));
        } else {
            // User is not authenticated
            return redirect()->route('login');
        }
    }
}