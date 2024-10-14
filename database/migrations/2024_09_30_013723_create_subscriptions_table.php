<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Assuming you have a users table
            $table->foreignId('dataset_id')->constrained()->onDelete('cascade'); // Assuming you have a datasets table
            $table->timestamps();

            // Optional: Adding indexes for better performance
            $table->index('user_id');
            $table->index('dataset_id');

            // Optional: Unique constraint to prevent duplicate subscriptions
            $table->unique(['user_id', 'dataset_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subscriptions');
    }
};
