<?php

use App\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProfileController;







Route::get('/register', [CustomerController::class, 'registration_page'])->name('auth.register');
Route::get('/login', [CustomerController::class, 'login_page'])->name('auth.login');


// Define the route to handle storing a new customer

Route::post('/detail', [CustomerController::class, 'store'])->name('customers.store');

Route::put('/detail', [CustomerController::class, 'update'])->name('customer.update');
Route::get('/detail/{customer}', [CustomerController::class, 'user_detail'])->name('profile.detail');
