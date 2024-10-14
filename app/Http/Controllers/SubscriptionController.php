<?php

namespace App\Http\Controllers;

use App\Models\Dataset;
use App\Models\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubscriptionController extends Controller
{
    public function subscribe($datasetId)
    {
        // Check if the user is already subscribed
        $user = Auth::user();
        $subscription = Subscription::where('user_id', $user->id)->where('dataset_id', $datasetId)->first();

        if (!$subscription) {
            // If not subscribed, create a new subscription
            Subscription::create([
                'user_id' => $user->id,
                'dataset_id' => $datasetId,
            ]);
        }


        return redirect()->back()->with('success', 'Successfully subscribed!');
    }

    public function unsubscribe($datasetId)
    {
        // Remove the subscription
        $user = Auth::user();
        Subscription::where('user_id', $user->id)->where('dataset_id', $datasetId)->delete();

        return redirect()->back()->with('success', 'Successfully unsubscribed!');
    }
}
