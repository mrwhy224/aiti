<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix'=>'v1'], function () {

    Route::group(['prefix'=>'post'], function () {
        Route::get('list', [\App\Http\Controllers\API\PostController::class, 'index']);
    });

    Route::group(['prefix'=>'company'], function () {
        Route::get('list', [\App\Http\Controllers\API\CompanyController::class, 'index']);
        Route::get('pending', [\App\Http\Controllers\API\CompanyController::class, 'pending']);
    });

    Route::group(['prefix'=>'invoice'], function () {
        Route::get('list', [\App\Http\Controllers\API\InvoiceController::class, 'index']);
        Route::get('statistics', [\App\Http\Controllers\API\InvoiceController::class, 'statistics']);
    });
});
