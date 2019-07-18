<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Services\UserService;

class AccountController extends Controller {

    protected $userService;

    public function __construct(UserService $userService) {
        $this->userService = $userService;
    }

    // get the current user
    public function index(Request $request) {
        return $this->userService->currentUser();
    }

    // update user password
    public function updatePassword(Request $request) {
        return $this->userService->updatePasswordCurrentUser($request);
    }
}
