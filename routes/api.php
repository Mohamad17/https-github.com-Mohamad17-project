<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Content\V1\CategoryController as ContentCategoryController;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

    Route::prefix('admin')->namespace('Admin')->group(function () {
        //api version 1
        Route::prefix('content')->namespace('Content')->group(function () {
        
        // market group
        Route::prefix('v1')->namespace('V1')->group(function () {
            // category
            Route::prefix('category')->group(function () {
                Route::get('/', [ContentCategoryController::class, 'index']);
                Route::post('/store', [ContentCategoryController::class, 'store']);
            });
        });
        });
    });