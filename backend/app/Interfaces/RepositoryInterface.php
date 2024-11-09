<?php

namespace App\Interfaces;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface RepositoryInterface {

    public function all(): Collection|array;

    public function find(int $id): Model|null;

    public function create(array $data): Model;
    
    public function update(int $id, array $data): Model|null;

    public function delete(int $id): bool;
}