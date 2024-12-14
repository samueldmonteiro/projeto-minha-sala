<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository extends AbstractRepository 
{
    public function __construct(User $model)
    {
        parent::__construct($model);
    }

    public function make(array $data): User
    {
        return $this->model->make($data);
    }
}
