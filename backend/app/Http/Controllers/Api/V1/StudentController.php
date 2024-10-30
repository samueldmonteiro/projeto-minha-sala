<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StudentRegister;
use App\Http\Resources\StudentResource;
use App\Models\Course;
use App\Models\Shift;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use PHPOpenSourceSaver\JWTAuth\Facades\JWTAuth;

class StudentController extends Controller
{
    public function store(StudentRegister $request): JsonResponse
    {
        $data = (object)$request->all();

        if (User::where('email', $data->email)->first()) {
            return jsonError(
                'Este e-mail já está sendo utilizado, tente outro!',
                ['email' => 'O e-mail já existe']
            );
        }

        $course = Course::where('name', $data->course)->first();
        if (!$course) {
            return jsonError('Curso não encontrado, Selecione novamente!');
        }

        $shift = Shift::where('name', $data->shift)->first();
        if (!$shift) {
            return jsonError('Turno não encontrado, Selecione novamente!');
        }

        $user = new User();
        $user->name = $data->name;
        $user->email = $data->email;
        $user->password = Hash::make($data->password);
        $user->type = 'student';
        $user->blocked = false;

        if (!$user->save()) {
            return jsonError('Erro ao cadastrar, tente novamente mais tarde!');
        }

        $student = new Student();
        $student->user_id = $user->id;
        $student->course_id = $course->id;
        $student->shift_id = $shift->id;
        $student->semester = $data->semester;

        if (!$student->save()) {
            return jsonError('Erro ao cadastrar, tente novamente mais tarde!');
        }

        $token = JWTAuth::fromUser($student);

        return json(
            (new AuthController)->respondWithToken($token, new StudentResource($student)),

            'Cadastro efetuado com Sucesso!'
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        //
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        //
    }
}
