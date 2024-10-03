<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->string('transaction_id')->unique(); // Change this to 'string' to support alphanumeric values
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('dataset_type');
            $table->enum('status', ['Pending', 'Success', 'Failed']);
            $table->decimal('amount', 8, 2);
            $table->string('payment_method');
            $table->dateTime('date');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('transactions');
    }
}
