<?php

namespace App\Services;

use App\Repositories\ClassInformationRepository;
use DateTime;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;

class ClassInformationService
{
    public function __construct(
        protected ClassInformationRepository $classInformationRepository,
    ) {}

    public function getTodayClass(): Collection
    {
        $date = new DateTime('now');

        $weekDay = $date->format('l');

        $weekDays = [
            'Sunday' => 'Domingo',
            'Monday' => 'Segunda-feira',
            'Tuesday' => 'Terça-feira',
            'Wednesday' => 'Quarta-feira',
            'Thursday' => 'Quinta-feira',
            'Friday' => 'Sexta-feira',
            'Saturday' => 'Sábado',
        ];

        /**if ($weekDays[$weekDay] == 'Sábado') {
            $date->modify('+2 days');
        }**/

        if ($weekDays[$weekDay] == 'Domingo') {
            $date->modify('+1 day');
        }

        $student = Auth::user()->entity;

        $weekDay = $date->format('l');
        $today = $weekDays[$weekDay];

        return $this->classInformationRepository->getByStudentData(
            $today,
            $student->course_id,
            $student->semester
        );
    }

    public function getClassByDay(string $day): Collection
    {
        $student = Auth::user()->entity;

        return $this->classInformationRepository->getByStudentData(
            $day,
            $student->course_id,
            $student->semester
        );
    }
}
