<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DatasetController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\ReportController;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'registerPost']);
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'loginPost']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/dashboard', [DashboardController::class, 'show'])->name('dashboard');

Route::get('/detail/{user}', [DetailController::class, 'show'])->name('detail.show');


Route::put('/user/update/{user}', [DetailController::class, 'update'])->name('user.update');
Route::put('/user/updatePassword/{user}', [DetailController::class, 'updatePassword'])->name('user.updatePassword');




Route::get('/dataset', [DatasetController::class, 'index'])->name('dataset');

Route::get('/report', [ReportController::class, 'show'])->name('report');