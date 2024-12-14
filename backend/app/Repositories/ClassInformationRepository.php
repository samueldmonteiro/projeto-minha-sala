<?php

namespace App\Repositories;

use App\Models\ClassInformation;
use Illuminate\Database\Eloquent\Collection;

class ClassInformationRepository extends AbstractRepository 
{
    public function __construct(
        ClassInformation $model
    ) {
        parent::__construct($model);
    }

    public function getByStudentData(string $day, int $course_id, int $semester): Collection
    {
        return $this->model->where('day', $day)
            ->where('course_id', $course_id)
            ->where('semester', $semester)
            ->get();
    }
}
