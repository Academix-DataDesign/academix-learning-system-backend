<?php

use Illuminate\{
    Support\Facades\Route,
    Http\Request
};

use App\Http\Controllers\ApiController;

use App\Http\Controllers\Api\{
    AuthenticationAPIController,
    CategoryAPIController,
    CourseAPIController,
    CurrencyAPIController,
    LanguageAPIController,
    NewsletterAPIController,
    ReleaseAPIController,
    ReportAPIController,
    TypeAPIController,
    UserAPIController,
    HomeAPIController
};

Route::middleware('auth:api')->match(['get', 'post'], '/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'v1', 'middleware' => ['api']], function () {
    Route::post('/register', [AuthenticationAPIController::class, 'registerUser'])->name('register2');
    Route::post('/login', [AuthenticationAPIController::class, 'loginUser'])->name('login2');
    Route::post('/logout', [AuthenticationAPIController::class, 'logoutUser'])->name('logout2');

    Route::apiResource('/users', UserAPIController::class);
    Route::get('/app/home', [HomeAPIController::class, 'home']);
    Route::get('/app/category/{id}', [HomeAPIController::class, 'category']);
    Route::apiResource('/courses', CourseAPIController::class);
    Route::apiResource('/categories', CategoryAPIController::class);
    Route::get('/categories-search', [CategoryAPIController::class, 'search']);
    Route::apiResource('/types', TypeAPIController::class);
    Route::apiResource('/languages', LanguageAPIController::class);
    Route::apiResource('/currencies', CurrencyAPIController::class);
    Route::apiResource('/reports', ReportAPIController::class);
    Route::apiResource('/releases', ReleaseAPIController::class);
    Route::apiResource('/newsletters', NewsletterAPIController::class);
});
// routes/api.php

Route::get('chart-data', [ApiController::class, 'getChartData']);
