<?php

use App\Http\Controllers\Api\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/activate/{token}', [AuthController::class, 'activateAccount'])->name('activate');
Route::get('/admin',[AdminController::class,'index'])->name('admin-home');