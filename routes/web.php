<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DatasetController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SubscriptionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TransactionController;

// Public routes
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'registerPost']);
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'loginPost']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Routes that require authentication
Route::middleware('auth')->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/dashboard/transactions', [TransactionController::class, 'index'])->name('dashboard.transactions');
    Route::post('/transactions', [TransactionController::class, 'store'])->name('transaction.store');

    Route::get('/dashboard/subscriptions', [SubscriptionController::class, 'index'])->name('dashboard.subscriptions');

    Route::get('/detail/{user}', [DetailController::class, 'show'])->name('detail.show');
    Route::put('/user/update/{user}', [DetailController::class, 'update'])->name('user.update');
    Route::put('/user/updatePassword/{user}', [DetailController::class, 'updatePassword'])->name('user.updatePassword');
    Route::put('/profile/{user}/upload-picture', [DetailController::class, 'uploadProfilePicture'])->name('profile.uploadPicture');

    Route::get('/dataset', [DatasetController::class, 'index'])->name('dataset');
    Route::get('/report', [ReportController::class, 'show'])->name('user.report');

    Route::post('/subscribe/{datasetId}', [SubscriptionController::class, 'subscribe'])->name('subscribe');
    Route::post('/unsubscribe/{datasetId}', [SubscriptionController::class, 'unsubscribe'])->name('unsubscribe');
    Route::get('/datasets/subscribed', [DatasetController::class, 'index'])->name('dataset.subscribed');
});