<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use Illuminate\Http\Request;

Route::middleware('auth:api')->match(['get', 'post'], '/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'v1', 'middleware' => ['api']], function () {
    Route::controller(AuthController::class)->group(function () {
        Route::post('/register', 'registerUser')->name('register');
        Route::post('/login', 'loginUser')->name('login');
    });
});
