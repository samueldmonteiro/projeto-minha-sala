<?php

namespace App\Repositories;

use App\Interfaces\RepositoryInterface;
use App\Models\User;

class UserRepository extends AbstractRepository implements RepositoryInterface
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
