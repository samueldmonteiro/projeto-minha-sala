<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\ClassInformation;
use DateTime;
use Illuminate\Http\Request;

class ClassInformationController extends ApiController
{
    public function today()
    {
        $date = new DateTime('now');

        $diaSemana = $date->format('l');

        $diasDaSemana = [
            'Sunday' => 'Domingo',
            'Monday' => 'Segunda-feira',
            'Tuesday' => 'Terça-feira',
            'Wednesday' => 'Quarta-feira',
            'Thursday' => 'Quinta-feira',
            'Friday' => 'Sexta-feira',
            'Saturday' => 'Sábado',
        ];

        if($diasDaSemana[$diaSemana] == 'Sábado'){
            $date->modify('+2 days');
        }
        if($diasDaSemana[$diaSemana] == 'Domingo'){
            $date->modify('+1 day');
        }
        $diaSemana = $date->format('l');


        $user = $this->user();

        $today = $diasDaSemana[$diaSemana];
        $course_id = (integer)$user->course_id;
        $semester = (integer)$user->semester;

        $classInformation = ClassInformation::where('day', $today)
        ->where('course_id', $course_id)->where('semester', $semester)->get();

        return $this->json(['class'=> $classInformation]);
    }

    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(ClassInformation $classInformation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ClassInformation $classInformation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ClassInformation $classInformation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ClassInformation $classInformation)
    {
        //
    }
}
