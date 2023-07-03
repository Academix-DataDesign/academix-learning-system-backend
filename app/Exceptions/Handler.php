<?php

namespace App\Exceptions;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
        });
    }

    public function render($request, Throwable $exception)
    {
        $URL = url()->current();
        if (str_contains($URL, '/api')) {
            if ($exception instanceof ModelNotFoundException) {
                return response(
                    [
                        "error" => "error-0001",
                        'timestamp' => Carbon::now(),
                        'status' => 404,
                        'message' => 'Not found',
                        "detail" => "Make sure you typed the ID parameter correctly in the request",
                        'path' => url()->current(),
                    ],
                    404
                );
            }
            if ($exception instanceof NotFoundHttpException) {
                return response(
                    [
                        "error" => "error-0002",
                        'timestamp' => Carbon::now(),
                        'status' => 400,
                        'message' => 'Invalid request',
                        "detail" => "Make sure the requested request exists",
                        'path' => url()->current(),
                    ],
                    400
                );
            }
        }

        return parent::render($request, $exception);
    }
}
