<?php

namespace App\Repositories;

use App\Models\UserVisit;
use App\Repositories\AbstractRepository;

class UserVisitRepository extends AbstractRepository 
{
    public function __construct(
        UserVisit $model,
    ) {
        parent::__construct($model);
    }

    public function getByUserId(int $id): ?UserVisit
    {
        return $this->model->where('user_id', $id)->first();
    }
}
