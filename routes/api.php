<?php

use App\Http\Controllers\Api\V1\AuthController;
use App\Http\Controllers\Api\V1\ClassInformationController;
use Illuminate\Support\Facades\Route;

// Version 1
Route::prefix('v1')->name('api.v1.')->group(function () {

    // ping
    Route::get('ping', function () {
        return response()->json(['pong' => true]);
    })->name('ping');


    // authentication
    Route::controller(AuthController::class)->prefix('auth')->name('auth.')->group(function () {

        Route::post('login/student', 'loginStudent')->name('login.student');
        Route::post('login/admin', 'loginAdmin')->name('login.admin');
        Route::get('me', 'me')->name('me')->middleware('authenticated');
        Route::get('logout', 'logout')->name('logout')->middleware('authenticated');
    });

    // class information
    Route::controller(ClassInformationController::class)->prefix('class_informations')->name('class_informations.')
        ->middleware('authenticated')->group(function () {

            Route::get('/today', 'today')->name('today');

        });
});
