<?php

namespace App\Http\Controllers;

use App\Models\Subscription;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    //
    public function index(Request $request)
    {
        if ($request->user()) {
            // User is authenticated
            $user = $request->user();
            $title = 'Subscriptions';

            // Get the number of items per page from the request, defaulting to 10
            $perPage = $request->input('per_page', 10);

            // Fetch the paginated subscriptions for the authenticated user
            $subscriptions = Subscription::where('user_id', $user->id)->paginate($perPage);

            // Pass subscriptions to the view
            return view('user.subscriptions', compact('user', 'title', 'subscriptions'));
        } else {
            // User is not authenticated
            return redirect()->route('login');
        }
    }
}
