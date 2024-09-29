<?php

namespace Database\Factories;

use App\Models\Dataset;
use Illuminate\Database\Eloquent\Factories\Factory;

class DatasetFactory extends Factory
{
    protected $model = Dataset::class;

    public function definition()
    {
        return [
            'user_id' => null,
            'name' => $this->faker->word(),
            'description' => $this->faker->text(100),
            'image' => 'default.png', // Set the static image name here
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
