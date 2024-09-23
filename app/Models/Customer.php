<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable; // Change this line
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Customer extends Authenticatable // Change this line
{
    use HasFactory;

    protected $fillable = [
        'title',
        'fullname',
        'country',
        'phone',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function properties()
    {
        return $this->hasMany(Property::class);
    }
}
