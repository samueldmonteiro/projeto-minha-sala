<?php

namespace App\Repositories;

use App\Interfaces\RepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

abstract class AbstractRepository implements RepositoryInterface
{
    public function __construct(protected Model $model) {}

    public function all(): Collection
    {
        return $this->model->all();
    }

    public function find(int $id): Model|null
    {
        return $this->model->find($id);
    }

    public function create(array $data): Model
    {
        $model = $this->model->create($data);
        return $model;
    }

    public function update(int $id, array $data): Model|null
    {
        $model = $this->model->find($id);
        if (!$model) return null;

        $model->update($data);
        return $model;
    }

    public function delete(int $id): bool
    {
        $this->model->delete($id);
        return true;
    }
}
