<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id('transaction_id'); // Transaction ID
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Ensure user_id is present
            $table->string('dataset_type');
            $table->string('status');
            $table->decimal('amount', 10, 2);
            $table->string('payment_method');
            $table->timestamp('date');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('transactions');
    }
}
