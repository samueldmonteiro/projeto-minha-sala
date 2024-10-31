<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\ClassInformation;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ClassInformationController extends ApiController
{
    public function today(): JsonResponse
    {
        $classInformation = (new ClassInformation())->getTodayClass($this->user());
        return json($classInformation);
    }
    

    public function getByDay(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'day' => 'required|string|in:Segunda-feira,Terça-feira,Quarta-feira,Quinta-feira,Sexta-feira,Sábado'
        ]);
    
        $day = $request->day;

        if ($validator->fails()) {
            $day = null;
        }

        return json((new ClassInformation())->getByDay($this->user(), $day));
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
