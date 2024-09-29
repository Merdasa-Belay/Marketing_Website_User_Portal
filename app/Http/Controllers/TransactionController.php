<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index(Request $request)
    {
        if ($request->user()) {
            $user = $request->user(); // Retrieve the authenticated user
            $perPage = $request->input('per_page', 10);
            $transactions = Transaction::paginate($perPage); // Fetch transactions

            return view(' dashboard.transactions', compact('user', 'transactions')); // Pass to view
        } else {
            return redirect()->route('login');
        }
    }
}
