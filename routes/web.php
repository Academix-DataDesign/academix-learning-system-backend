<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Api\AuthenticationAPIController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return to_route('login');
});

Route::get('/activate/{token}', [AuthenticationAPIController::class, 'activateAccount'])->name('activate');
Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin-dashboard');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
