<?php

namespace App\Repositories;

use App\Models\Admin;
use App\Repositories\AbstractRepository;
use Illuminate\Support\Facades\Hash;

class AdminRepository extends AbstractRepository
{
    public function __construct(
        Admin $model,
        protected UserRepository $userRepository
    ) {
        parent::__construct($model);
    }

    public function create(array $data): Admin
    {
        $admin = $this->model->create([
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        $user = $this->userRepository->make([
            'name' => $data['name'],
            'type' => $data['type'],
        ]);

        $admin->user()->save($user);

        return $admin;
    }

    public function findByEmail(string $email): ?Admin
    {
        return $this->model->where('email', $email)->first();
    }
}
