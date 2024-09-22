<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\CustomerController;
use App\Models\Customer;
use Illuminate\Support\Facades\Route;

// registration route
Route::get('/register', [AuthController::class, 'registration'])->name('register');

// login route
Route::get('login', [AuthController::class, 'login'])->name('login');


Route::resource('/customers', CustomerController::class);
// registration post route
Route::post('register', [AuthController::class, 'registrationPost']);

Route::get('/report', [CustomerController::class, 'myReport'])->name('report');

Route::get('/dataset', [CustomerController::class, 'myDataset'])->name('dataset');


// Route for updating customer password
Route::put('/customers/{customer}/password', [CustomerController::class, 'updatePassword'])->name('customers.updatePassword');
