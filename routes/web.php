<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\CustomerController;
use App\Models\Customer;
use Illuminate\Support\Facades\Route;

// registration route
Route::get('/register', [AuthController::class, 'registration'])->name('register');
// Route for login page (GET request)
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.show');

// Route for handling login submission (POST request)
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');

Route::resource('/customers', CustomerController::class);
// registration post route
Route::post('register', [AuthController::class, 'registrationPost']);

// route for customer dashboard

Route::get('customers/{customer}/dashboard', [CustomerController::class, 'myDashboard'])->name('customers.dashboard');

// Route for customer report

Route::get('/report', [CustomerController::class, 'myReport'])->name('report');


// Route for dataset
Route::get('/dataset', [CustomerController::class, 'myDataset'])->name('dataset');


// Route for updating customer password
Route::put('/customers/{customer}/password', [CustomerController::class, 'updatePassword'])->name('customers.updatePassword');
