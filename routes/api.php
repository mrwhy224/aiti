<?php

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group(['prefix'=>'v1'], function () {
    Route::group(['prefix'=>'post'], function () {
        Route::get('list', [\App\Http\Controllers\API\PostController::class, 'index']);
    });
});
