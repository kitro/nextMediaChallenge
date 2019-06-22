<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\User;

class AccountController extends Controller
{
    // retreive user profile
    public function index(Request $request) {
        $data['ok'] = true;

        $user = Auth::user();

        $data['user'] = $user;

        return $data;
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
