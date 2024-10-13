<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Dataset;
use App\Models\User;

class DatasetSeeder extends Seeder
{
    public function run()
    {
        // Retrieve the authenticated user
        $user = User::first(); // You can modify this to fetch a specific user if needed

        // Check if user exists
        if ($user) {
            // Create 10 datasets for the specified user
            Dataset::factory()->count(12)->create(['user_id' => $user->id]);
        }
    }
}
