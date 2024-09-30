<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    // Method to generate a unique transaction ID


    public function index(Request $request)
    {
        if ($request->user()) {
            $user = $request->user(); // Retrieve the authenticated user
            $perPage = $request->input('per_page', 10);
            $transactions = Transaction::paginate($perPage); // Fetch transactions

            return view('dashboard.transactions', compact('user', 'transactions')); // Pass to view
        } else {
            return redirect()->route('login');
        }
    }

    public function store(Request $request)
    {
        // Validate incoming request
        $request->validate([
            'dataset_type' => 'required|string',
            'amount' => 'required|numeric',
            'payment_method' => 'required|string',
        ]);

        // Create a new transaction
        Transaction::create([
            'transaction_id' => $this->generateTransactionId(), // Generate a new transaction ID
            'dataset_type' => $request->input('dataset_type'),
            'status' => 'Pending', // Default status
            'amount' => $request->input('amount'),
            'payment_method' => $request->input('payment_method'),
            'date' => now(), // Use current date and time
        ]);

        // Redirect or return response
        return redirect()->route('transaction.index')->with('success', 'Transaction created successfully.');
    }
}
