<?php

use App\Http\Controllers\Api\V1\Admin\AdminController;
use App\Http\Controllers\Api\V1\AuthController;
use App\Http\Controllers\Api\V1\ClassInformationController;
use App\Http\Controllers\Api\V1\StudentController;
use Illuminate\Support\Facades\Route;

// Version 1
Route::prefix('v1')->name('api.v1.')->group(function () {

    // ping
    Route::get('ping', function () {
        return json(['pong' => true], 'Ping efetuado com sucesso!');
    })->name('ping');


    // authentication
    Route::controller(AuthController::class)->prefix('auth')->name('auth.')->group(function () {

        Route::post('login/student', 'loginStudent')->name('login.student');
        Route::post('login/admin', 'loginAdmin')->name('login.admin');

        Route::post('register/student', [StudentController::class, 'store'])->name('register.student');

        Route::get('me', 'me')->name('me')->middleware('authenticated');
        Route::get('check', 'check')->name('check');

        Route::get('logout', 'logout')->name('logout')->middleware('authenticated');
    });

    // class information
    Route::controller(ClassInformationController::class)->prefix('class_informations')->name('class_informations.')
        ->middleware('authenticated')->group(function () {

            Route::get('/today', 'today')->name('today');
            Route::post('/getByDay', 'getByDay')->name('getByDay');

        });

    // admin
    Route::controller(AdminController::class)
        ->prefix('admin')->name('admin.')->middleware('auth:admin')->group(function () {

            Route::get('students/list', 'listStudents')->name('listStudents');
        });
});
