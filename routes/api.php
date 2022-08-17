<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Content\V1\CategoryController as ContentCategoryController;
use App\Http\Controllers\Admin\Content\V1\PostController;
use App\Http\Controllers\Customer\V1\UserController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('admin')->group(function () {
    //api version 1
    Route::prefix('content')->group(function () {

        // content group
        Route::prefix('v1')->group(function () {
            // category
            Route::prefix('category')->group(function () {
                Route::get('/', [ContentCategoryController::class, 'index']);
                Route::get('/show/{postCategory}', [ContentCategoryController::class, 'show']);
                Route::post('/store', [ContentCategoryController::class, 'store']);
                Route::put('/update/{postCategory}', [ContentCategoryController::class, 'update']);
                Route::delete('/destroy/{postCategory}', [ContentCategoryController::class, 'destroy']);
            });
            // post
            Route::prefix('post')->group(function () {
                Route::get('/', [PostController::class, 'index']);
                Route::get('/show/{post}', [PostController::class, 'show']);
                Route::post('/store', [PostController::class, 'store']);
                Route::put('/update/{post}', [PostController::class, 'update']);
                Route::delete('/destroy/{post}', [PostController::class, 'destroy']);
            });
        });
    });
});
// user group
Route::prefix('v1')->group(function () {
    Route::get('/user', [UserController::class, 'index']);
});
