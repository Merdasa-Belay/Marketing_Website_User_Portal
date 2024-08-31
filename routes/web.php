<?php

use App\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Route;

// Registration page
Route::get('/customer_register', [CustomerController::class, 'registration'])->name('customer.register');

// Login page
Route::get('/customer_login', [CustomerController::class, 'login_page'])->name('customer.login');

// Resource routes for customers (CRUD operations)
Route::resource('/customers', CustomerController::class);



// Handle update request
Route::put('/my-detail', [CustomerController::class, 'update'])->name('customer.update');

// Dashboard
Route::get('/my-dashboard', [CustomerController::class, 'myDashboard'])->name('my_dashboard');

// Reports
Route::get('/my-reports', [CustomerController::class, 'myReports'])->name('my_reports');

// Datasets
Route::get('/my-datasets', [CustomerController::class, 'myDatasets'])->name('my_datasets');
