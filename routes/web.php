<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CustomerController;
use App\Models\Customer;
use Illuminate\Support\Facades\Route;

Route::get('/customer_register', [CustomerController::class, "registration"]);
Route::get('/customer_login', [CustomerController::class, "login_page"]);

Route::get('/subscriber_dashboard', [CustomerController::class, "subscriber"]);

Route::resource('/customers', CustomerController::class);