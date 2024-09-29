<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Transaction;
use App\Models\User; // Import User model

class TransactionSeeder extends Seeder
{
    public function run()
    {
        // Retrieve the authenticated user (first user in this case)
        $user = User::first(); // Modify this to fetch a specific user if needed

        // Check if user exists
        if ($user) {
            // Create 10 transactions for the specified user
            foreach (range(1, 10) as $index) {
                Transaction::create([
                    'user_id' => $user->id, // Assign the user ID
                    'dataset_type' => fake()->word(), // Random dataset type
                    'status' => fake()->randomElement(['Pending', 'Completed', 'Failed']), // Random status
                    'amount' => fake()->randomFloat(2, 10, 1000), // Random amount between 10 and 1000
                    'payment_method' => fake()->randomElement(['Credit Card', 'PayPal', 'Bank Transfer']), // Random payment method
                    'date' => fake()->dateTimeThisYear(), // Random date
                ]);
            }
        } else {
            // Optionally handle the case where no users exist
            $this->command->info('No users found to associate transactions with.');
        }
    }
}
