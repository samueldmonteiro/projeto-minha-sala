<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminLoginRequest;
use App\Repositories\AdminRepository;

class AdminController extends Controller
{

    public function __construct(
        protected AdminRepository $adminRepository
    ) {}
    
    public function index()
    {
        return json('ACESSO ADMIN');
    }


    public function store(AdminLoginRequest $request) {}
}
