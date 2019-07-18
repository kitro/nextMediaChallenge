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
        $data['ok'] = true;

        $user = Auth::user();

        // check passowrd
        if(!Hash::check($request->old_password, Auth::user()->password)) {
            $data['ok'] = false;
            $data['msg'] = "Password incorrect";
            return response()->json($data, 401);
        } else {
            $user = User::findOrFail(Auth::user()->id);
            $user->password = Hash::make($request->password);
            $user->save();
        }        

        return $data;
    }
}
