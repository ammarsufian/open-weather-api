<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserLoginRequest;
use App\Http\Requests\UserRegisterRequest;
use App\Http\Services\AuthenticateService;

class AuthenticateController extends Controller
{

    public function login(UserLoginRequest $request,AuthenticateService $authenticateService)
    {
        return $authenticateService->login($request);
    }

    public function register(UserRegisterRequest $request,AuthenticateService $authenticateService)
    {
        return $authenticateService->register($request);
    }
}
