<?php

namespace App\Repositories;

use App\Interfaces\RepositoryInterface;
use App\Models\UserVisit;
use App\Repositories\AbstractRepository;

class UserVisitRepository extends AbstractRepository implements RepositoryInterface
{
    public function __construct(
        UserVisit $model,
    ) {
        parent::__construct($model);
    }

    public function getByUserId(int $id): UserVisit|null
    {
        return $this->model->where('user_id', $id)->first();
    }

}
