<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;
    public function subscriptions()
    {
        return $this->hasMany(Subscription::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function dataset()
    {
        return $this->belongsTo(Dataset::class);
    }
}
