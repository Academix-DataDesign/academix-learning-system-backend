<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Api\AuthenticationController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/activate/{token}', [AuthenticationController::class, 'activateAccount'])->name('activate');
Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin-dashboard');
