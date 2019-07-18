<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


use App\Services\UserService;
use App\Http\Requests\UserCreateRequest;

class SignupController extends Controller {

    protected $userService;

    public function __construct(UserService $userService) {
        $this->userService = $userService;

    }

    // create new user
    public function signup(UserCreateRequest $request) {       
        return $this->userService->create($request);
    }
    
}
