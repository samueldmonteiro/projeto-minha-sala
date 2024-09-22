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
    Route::controller(AuthController::class)->prefix('auth')->group(function () {

        Route::get('me', 'me')->name('me');
        Route::post('login/student', 'loginStudent')->name('login.student');
        Route::post('login/admin', 'loginAdmin')->name('login.admin');
    });

    // class information
    Route::controller(ClassInformationController::class)->prefix('class_informations')->name('class_informations.')
        ->middleware('authenticated')->group(function () {

            Route::get('/today', 'today')->name('today');

        });


    Route::get('/student', function () {
        // Exemplo de data vinda do banco de dados
        $data = '2024-09-22';

        // Cria um objeto DateTime a partir da data
        $date = new DateTime($data);

        // Define o nome do dia da semana em português
        $diaSemana = $date->format('l');

        // Um array para traduzir os dias da semana
        $diasDaSemana = [
            'Sunday' => 'Domingo',
            'Monday' => 'Segunda-feira',
            'Tuesday' => 'Terça-feira',
            'Wednesday' => 'Quarta-feira',
            'Thursday' => 'Quinta-feira',
            'Friday' => 'Sexta-feira',
            'Saturday' => 'Sábado',
        ];

        // Exibe o nome do dia da semana em português
        return $diasDaSemana[$diaSemana]; // Saída: Domingo

    })->middleware('auth:student');
});
