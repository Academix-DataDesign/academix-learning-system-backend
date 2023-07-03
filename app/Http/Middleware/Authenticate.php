<?php

namespace App\Http\Middleware;

use Carbon\Carbon;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (!$request->expectsJson()) {
            return route('login');
        }
    }

    protected function unauthenticated($request, array $guards)
    {
        abort(response()->json(
            [
                "error" => "unauthenticated-0001",
                'timestamp' => Carbon::now(),
                'status' => 401,
                'message' => 'Invalid token',
                'path' => url()->current(),
            ],
            401
        ));
    }
}
