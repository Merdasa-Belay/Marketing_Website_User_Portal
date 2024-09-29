<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transaction>
 */
class TransactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'transaction_id' => $this->generateTransactionId(), // Use the private method
            'dataset_type' => $this->faker->word(),
            'status' => $this->faker->randomElement(['Pending', 'Completed', 'Failed']),
            'amount' => $this->faker->randomFloat(2, 10, 1000),
            'payment_method' => $this->faker->randomElement(['Credit Card', 'Bank Transfer', 'PayPal']),
            'date' => $this->faker->dateTimeBetween('-1 year', 'now'),
        ];
    }

    private function generateTransactionId()
    {
        $prefix = '#';
        $numbers = mt_rand(1000, 9999); // Generates a 4-digit random number
        $letters = strtoupper(substr(md5(uniqid()), 0, 2)); // Generates 2 random letters
        $suffix = mt_rand(100000, 999999); // Generates a 6-digit random number

        return $prefix . $numbers . $letters . $suffix;
    }
}
