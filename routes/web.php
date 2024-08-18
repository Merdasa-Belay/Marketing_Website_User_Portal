<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CustomerController;
use App\Models\Customer;
use Illuminate\Support\Facades\Route;
// Registration page
Route::get('/customer_register', [CustomerController::class, "registration"]);



// Login page
Route::get('/customer_login', [CustomerController::class, "login_page"]);


Route::resource('/customers', CustomerController::class);


// user profile

Route::get('/my-detail', [CustomerController::class, 'myDetail'])->name('my_detail');

// dashboard
Route::get('/my-dashboard', [CustomerController::class, 'myDashboard'])->name('my_dashboard');

// reports

Route::get('/my-reports', [CustomerController::class, 'myReports'])->name('my_reports');


// Datasets



Route::get('/my-datasets', [CustomerController::class, 'myDatasets'])->name('my_datasets');
