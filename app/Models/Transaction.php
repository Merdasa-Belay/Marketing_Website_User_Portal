<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $table = 'transactions';

    protected $fillable = ['dataset_type', 'status', 'amount', 'payment_method', 'date'];


    protected function generateTransactionId()
    {
        $numbers = rand(1000, 9999); // Generate a random number between 1000 and 9999
        $letters = strtoupper(substr(str_shuffle('abcdefghijklmnopqrstuvwxyz'), 0, 2)); // Generate 2 random letters
        $additionalNumbers = rand(100000, 999999); // Generate a random number between 100000 and 999999

        return '#' . $numbers . $letters . $additionalNumbers; // Return the formatted transaction ID
    }
}
