<?php

namespace App\UseCases\ClassInformation;

use App\Repositories\ClassInformationRepository;
use App\UseCases\Auth\GetUser;
use Illuminate\Database\Eloquent\Collection;

class GetClassByDay
{
    public function __construct(
        private ClassInformationRepository $classInformationRepository,
        private GetUser $getUser
    ) {}
    public function execute(string $day): Collection
    {
        $student = $this->getUser->execute()->entity;

        return $this->classInformationRepository->getByStudentData(
            $day,
            $student->course_id,
            $student->semester
        );
    }
}
