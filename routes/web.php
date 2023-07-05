<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/activate/{token}', [AuthController::class, 'activateAccount'])->name('activate');
// Route::get('/admin', [AdminController::class, 'index'])->name('admin-home');
