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
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return to_route('login');
});

Route::get('/search', [DashboardController::class, 'search'])->name('user.search');

Route::get('/activate/{token}', [AuthenticationAPIController::class, 'activateAccount'])->name('activate');

Route::group(['prefix' => 'admin/dashboard', 'as' => 'web.'], function () {
    Route::get('/', [DashboardController::class, 'index'])->name('admin-dashboard');

    Route::resource('courses', CourseController::class);
    Route::resource('types', TypeController::class);
    Route::resource('languages', LanguageController::class);
    Route::resource('currencies', CurrencyController::class);
    Route::resource('reports', ReportController::class);
    Route::resource('releases', ReleaseController::class);
    Route::resource('newsletters', NewsletterController::class);
});

// Auth routes
Auth::routes();
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
