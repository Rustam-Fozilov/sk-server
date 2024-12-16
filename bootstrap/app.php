<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        using: function () {
            $lang = getLang();

            Route::middleware('api')
                ->prefix('api' . $lang)
                ->group(base_path('routes/api.php'));

            Route::middleware('web')
                ->prefix($lang)
                ->group(base_path('routes/web.php'));
        },
    )
    ->withSchedule(function(Schedule $schedule) {
        $schedule->command('telescope:prune')->everyMinute();
    })
    ->withMiddleware(function (Middleware $middleware) {
        //
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
