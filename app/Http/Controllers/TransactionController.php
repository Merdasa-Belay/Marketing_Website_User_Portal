<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    // Method to generate a unique transaction ID
    protected function generateTransactionId()
    {
        $numbers = rand(1000, 9999); // Generate a random number between 1000 and 9999
        $letters = strtoupper(substr(str_shuffle('abcdefghijklmnopqrstuvwxyz'), 0, 2)); // Generate 2 random letters
        $additionalNumbers = rand(100000, 999999); // Generate a random number between 100000 and 999999

        return '#' . $numbers . $letters . $additionalNumbers; // Return the formatted transaction ID
    }

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
