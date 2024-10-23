<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\ClassInformation;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ClassInformationController extends ApiController
{
    public function today(): JsonResponse
    {
        $classInformation = (new ClassInformation())->getClassByDay($this->user());
        return json($classInformation);
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
