<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dataset extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description', 'image'];


    public function subscriptions()
    {
        return $this->hasMany(Subscription::class);
    }
}
