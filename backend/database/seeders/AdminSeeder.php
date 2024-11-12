<?php

namespace Database\Seeders;

use App\Repositories\AdminRepository;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{

    public function run(): void
    {
        $adminRepository = app(AdminRepository::class);

        $adminRepository->create([
            'name' => 'adm_01',
            'email' => 'samuel.dvmonteiro@gmail.com',
            'password' => '4321',
            'type' => 'admin'
        ]);
    }
}
