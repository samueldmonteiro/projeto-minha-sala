<?php

namespace App\Repositories;

use App\Models\Course;

class CourseRepository extends AbstractRepository 
{
    public function __construct(Course $model)
    {
        parent::__construct($model);
    }

    public function findByName(string $name): ?Course
    {
        return $this->model->where('name', $name)->first();
    }
}
