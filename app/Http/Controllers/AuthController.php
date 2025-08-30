<?php

namespace App\Http\Controllers;

use App\Services\AuthService;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function __construct(
        protected AuthService $authService
    ) {}

    public function login()
    {
        return $this->authService->login();
    }

    public function loginPost(Request $request)
    {
        return $this->authService->loginPost($request);
    }

    public function register()
    {
        return $this->authService->register();
    }

    public function registerPost(Request $request)
    {
        return $this->authService->registerPost($request);
    }

    public function logout(Request $request)
    {
        return $this->authService->logout($request);
    }
}
