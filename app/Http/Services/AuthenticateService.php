<?php

namespace App\Http\Services;

use App\Http\Requests\UserLoginRequest;
use App\Http\Requests\UserRegisterRequest;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthenticateService
{

    public function login(UserLoginRequest $request)
    {
        if (!Auth::attempt($request->only(['email', 'password']))) {
            throw new Exception('Invalid credentials');
        }

        return User::ofEmail(data_get($request, 'email'))->first();
    }

    public function register(UserRegisterRequest $request)
    {
        return User::create([
            'user_name' => $request->get('user_name'),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password')),
        ]);
    }
}
