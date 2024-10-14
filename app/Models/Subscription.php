<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;

    // Define the table name if it's not the plural form of the model name
    // protected $table = 'subscriptions';

    // Specify the fillable attributes for mass assignment
    protected $fillable = [
        'user_id',      // Foreign key referencing users
        'dataset_id',   // Foreign key referencing datasets
    ];

    /**
     * Get the user that owns the subscription.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Subscription.php
    public function dataset()
    {
        return $this->belongsTo(Dataset::class);
    }
}
