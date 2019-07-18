<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\UserLoginRequest;

use App\Services\AuthService;

class SigninController extends Controller {

    protected $authService;

    public function __construct(AuthService $authService) {
        $this->authService = $authService;
    }

    // sign in
    public function signin(UserLoginRequest $request) {
        return $this->authService->login($request);
    }
}
