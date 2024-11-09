<?php

use App\Http\Controllers\Api\V1\AdminController;
use App\Http\Controllers\Api\V1\AuthController;
use App\Http\Controllers\Api\V1\ClassInformationController;
use App\Http\Controllers\Api\V1\StudentController;
use App\Http\Controllers\Api\V1\UserVisitController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return json('active', 'API Minha Sala');
});

Route::prefix('v1')->group(function () {

    // Auth
    Route::prefix('auth')->controller(AuthController::class)->name('auth.')->group(function () {

        Route::post('login/student', 'loginStudent')->name('login.student');

        Route::post('login/admin', 'loginAdmin')->name('login.admin');

        Route::get('check', 'check')->name('check')->middleware('auth:user');

        Route::get('me', 'me')->name('me')->middleware('auth:user');

        Route::get('logout', 'logout')->name('logout')->middleware('auth:user');
    });

    // Student
    Route::prefix('student')->controller(StudentController::class)->name('student.')->group(function () {

        Route::post('register', 'store')->name('store');

        Route::get('access', 'access')->name('access')->middleware(['auth:user', 'student']);
    });

    // Admin
    Route::prefix('admin')->controller(AdminController::class)->name('admin.')->group(function () {

        Route::post('register', 'store')->name('store');

        Route::get('access', 'index')->name('access')->middleware(['auth:user', 'admin']);
    });

    // class Information
    Route::middleware('auth:user')->prefix('class_information')->controller(ClassInformationController::class)->name('class_information.')->group(function () {

        Route::get('today', 'today')->name('today');
        Route::get('getByDay', 'getByDay')->name('getByDay');
    });

    // User Visit
    Route::middleware('auth:user')->prefix('visits')->controller(UserVisitController::class)->name('userVists.')->group(function () {

        Route::get('all', 'all')->name('all');
    });
});
