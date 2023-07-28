<?php

namespace App\Providers;

use App\Models\Course;
use App\Models\Currency;
use App\Models\Newsletter;
use App\Models\Release;
use App\Models\Report;
use App\Models\Type;
use App\Models\Language;
use App\Models\User;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class GlobalVariablesServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        // View::composer('*', function ($view) {
        //     $counts = [
        //         'courses' => Course::count(),
        //         'types' => Type::count(),
        //         'languages' => Language::count(),
        //         'currencies' => Currency::count(),
        //         'reports' => Report::count(),
        //         'releases' => Release::count(),
        //         'newsletters' => Newsletter::count(),
        //     ];

        //     $view->with('counts', $counts);
        // });

        View::composer('*', function ($view) {
            $counts = Cache::remember('counts', now()->addMinutes(10), function () {
                return [
                    'usersC' => User::query()->count(),
                    'courses' => Course::query()->count(),
                    'types' => Type::query()->count(),
                    'languages' => Language::query()->count(),
                    'currencies' => Currency::query()->count(),
                    'reports' => Report::query()->count(),
                    'releases' => Release::query()->count(),
                    'newsletters' => Newsletter::query()->count(),
                ];
            });

            $view->with('counts', $counts);
        });
    }
}
