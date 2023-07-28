<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Api\AuthenticationAPIController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\CurrencyController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\ReleaseController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\TypeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return to_route('login');
});

Route::get('/activate/{token}', [AuthenticationAPIController::class, 'activateAccount'])->name('activate');

Route::group(['prefix' => 'admin/dashboard', 'as' => 'web.'], function () {
    Route::get('/', [DashboardController::class, 'index'])->name('admin-dashboard');

    Route::resource('courses', CourseController::class);
    Route::resource('type', TypeController::class);
    Route::resource('language', LanguageController::class);
    Route::resource('currency', CurrencyController::class);
    Route::resource('report', ReportController::class);
    Route::resource('release', ReleaseController::class);
    Route::resource('newsletter', NewsletterController::class);
});

// Auth routes
Auth::routes();
Route::get('/logout', [LoginController::class, 'logout']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
