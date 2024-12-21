<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactFormController;
use App\Http\Controllers\LikedController;
use App\Http\Controllers\SavedController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\UniversityController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::any('test', function (Request $request) {
    //
});

Route::post('search', [SearchController::class, 'search']);
Route::post('form', [ContactFormController::class, 'store']);

Route::prefix('auth')->group(function () {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('confirm/code', [AuthController::class, 'confirmCode']);
});

Route::middleware('auth:sanctum')->group(function () {
    Route::get('logout', [AuthController::class, 'logout']);
    Route::prefix('user')->group(function () {
        Route::get('me', [UserController::class, 'me']);

        Route::prefix('search/history')->group(function () {
            Route::get('list', [SearchController::class, 'searchHistoryList']);
            Route::post('add', [SearchController::class, 'addSearchHistory']);
            Route::delete('delete', [SearchController::class, 'deleteSearchHistory']);
        });

        Route::prefix('saved')->group(function () {
            Route::get('list', [SavedController::class, 'list']);
            Route::post('add', [SavedController::class, 'add']);
            Route::delete('delete', [SavedController::class, 'delete']);
        });

        Route::prefix('liked')->group(function () {
            Route::get('list', [LikedController::class, 'list']);
            Route::post('add', [LikedController::class, 'add']);
            Route::delete('delete', [LikedController::class, 'delete']);
        });
    });
});

Route::apiResources([
    'blogs'        => BlogController::class,
    'universities' => UniversityController::class,
]);
