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

Route::group(['prefix' => 'v1', 'middleware' => ['api']], function () {
    Route::post('/register', [AuthController::class, 'registerUser'])->name('register');
    Route::post('/login', [AuthController::class, 'loginUser'])->name('login');

    Route::apiResource('/users', UserController::class);
    Route::apiResource('/courses', CourseController::class);
    Route::apiResource('/categories', CategoryController::class);
    Route::apiResource('/types', TypeController::class);
    Route::apiResource('/languages', LanguageController::class);
    Route::apiResource('/currencies', CurrencyController::class);
    Route::apiResource('/reports', ReportController::class);
    Route::apiResource('/releases', ReleaseController::class);
    Route::apiResource('/newsletters', NewsletterController::class);
});
