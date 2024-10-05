<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Support\Facades\Route;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
        then: function() {
            Route::middleware('api' . getLang())
                ->prefix('api')
                ->group(base_path('routes/api.php'));
        },
    )
    ->withMiddleware(function (Middleware $middleware) {
        //
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();


function getLang(): string
{
    $url = explode('/', request()->url());
    $url = array_slice($url, 3);

    $lang = '';
    $p = @$url[0] == 'api' ? 1 : 0;
    if (in_array(@$url[$p], config('app.languages'))) {
        $lang = '/' . $url[$p];
        app()->setLocale($url[$p]);
    }
    return $lang;
}
