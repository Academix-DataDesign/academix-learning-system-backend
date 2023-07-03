<?php

use Illuminate\{
    Support\Facades\Route,
    Http\Request,
};

use App\Http\Controllers\Api\{
    AuthController,
    UserController,
    TypeController,
    LanguageController,
    CategoryController,
    CourseController,
    CurrencyController,
    NewsletterController,
    ReleaseController,
    ReportController
};

Route::middleware('auth:api')->match(['get', 'post'], '/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'v1', 'middleware' => ['api', 'auth:api']], function () {
    Route::controller(AuthController::class)->group(function () {
        Route::post('/register', 'registerUser')->name('register');
        Route::post('/login', 'loginUser')->name('login');

        Route::get('/users', [UserController::class, 'index']);
        Route::get('/types', [TypeController::class, 'index']);
        Route::get('/languages', [LanguageController::class, 'index']);
        Route::get('/courses', [CourseController::class, 'index']);
        Route::get('/categories', [CategoryController::class, 'index']);
        Route::get('/currencies', [CurrencyController::class, 'index']);
        Route::get('/reports', [ReportController::class, 'index']);
        Route::get('/releases', [ReleaseController::class, 'index']);
        Route::get('/newsletters', [NewsletterController::class, 'index']);
    });
});;
