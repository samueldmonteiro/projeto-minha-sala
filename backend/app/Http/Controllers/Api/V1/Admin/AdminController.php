<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Api\V1\ApiController;
use App\Http\Resources\StudentResource;
use App\Models\Admin;
use App\Models\Student;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AdminController extends ApiController
{
    public function listStudents(Request $request): JsonResponse
    {
        $query = Student::query();

        // Filtrar por course_id, se estiver presente
        if ($request->has('course_id')) {
            $query->where('course_id', $request->course_id);
        }

        // Filtrar por semester, se estiver presente
        if ($request->has('semester')) {
            $query->where('semester', $request->semester);
        }

        // Filtrar por shift_id, se estiver presente
        if ($request->has('shift_id')) {
            $query->where('shift_id', $request->shift_id);
        }

        // Executa a query e retorna os usuários filtrados
        $users = $query->paginate(10);

        // Retornar a lista de usuários em JSON
        return json([
            'students' => StudentResource::collection($users)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
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
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Admin $admin)
    {
        //
    }
}
