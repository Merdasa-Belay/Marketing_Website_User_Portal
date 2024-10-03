<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Transaction;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transaction>
 */
class TransactionFactory extends Factory
{
    protected $model = Transaction::class; // Specify the model

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'transaction_id' => $this->generateTransactionId(), // Use the custom method to generate transaction ID
            'user_id' => User::inRandomOrder()->first()->id ?? User::factory(), // Use an existing user or create one if none exists
            'dataset_type' => $this->faker->word(),
            'status' => $this->faker->randomElement(['Pending', 'Success', 'Failed']),
            'amount' => $this->faker->randomFloat(2, 10, 1000),
            'payment_method' => $this->faker->randomElement(['Credit Card', 'Bank Transfer', 'PayPal']),
            'date' => $this->faker->dateTimeBetween('-1 year', 'now'),
        ];
    }

    /**
     * Generate a unique transaction ID.
     *
     * @return string
     */
    protected function generateTransactionId(): string
    {
        return '#' . strtoupper(uniqid());
    }
}
