<?php

namespace App\UseCases\ClassInformation;

use DateTime;
use App\Repositories\ClassInformationRepository;
use App\UseCases\Auth\GetUser;
use Illuminate\Database\Eloquent\Collection;

class GetTodayClass
{
    public function __construct(
        private ClassInformationRepository $classInformationRepository,
        private GetUser $getUser
    ) {}

    public function execute(): Collection
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

        $student = $this->getUser->execute()->entity;

        $weekDay = $date->format('l');
        $today = $weekDays[$weekDay];

        return $this->classInformationRepository->getByStudentData(
            $today,
            $student->course_id,
            $student->semester
        );
    }

   
}
