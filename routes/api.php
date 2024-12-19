<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\SavedController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\UniversityController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::get('search', [SearchController::class, 'search']);
Route::post('login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::prefix('user')->group(function () {
        Route::get('me', [UserController::class, 'me']);
        Route::get('saved', [UserController::class, 'saved']);
        Route::get('search/history', [UserController::class, 'searchHistory']);
        Route::post('search/save', [SearchController::class, 'save']);
        Route::post('save', [SavedController::class, 'save']);
    });
});

Route::apiResources([
    'blogs' => BlogController::class,
    'universities' => UniversityController::class,
]);
