<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\TypeController;
use App\Http\Controllers\Api\LanguageController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\CourseController;
use App\Http\Controllers\Api\CurrencyController;
use App\Http\Controllers\Api\NewsletterController;
use App\Http\Controllers\Api\ReleaseController;
use App\Http\Controllers\Api\ReportController;


// Route::middleware('auth:api')->match(['get', 'post'], '/user', function (Request $request) {
//     return $request->user();
// });

Route::group(['prefix' => 'v1', 'middleware' => ['api']], function () {
    Route::controller(AuthController::class)->group(function () {
        Route::post('/register', 'registerUser')->name('register');
        Route::post('/login', 'loginUser')->name('login');
    });
    //Users
    Route::get('/users', [UserController::class, 'index']);
    //User Types
    Route::get('/types', [TypeController::class, 'index']);
    //Courses
    Route::get('/courses', [CourseController::class, 'index']);
    //Languages
    Route::get('/languages', [LanguageController::class, 'index']);
    //Categories
    Route::get('/categories', [CategoryController::class, 'index']);
    //Currencies
    Route::get('/currencies', [CurrencyController::class, 'index']);
    //Reports
    Route::get('/reports', [ReportController::class, 'index']);
    //Releases
    Route::get('/releases', [ReleaseController::class, 'index']);
    //Newsletters
    Route::get('/newsletters', [NewsletterController::class, 'index']);
});
