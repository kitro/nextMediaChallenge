<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\User;

class SignupController extends Controller
{
    // create new user
    public function signup(Request $request) {
        $data['ok'] = true;
        
        $user = new User;
        $user->name = ""; // empty for now
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        $data['user'] = $user;
        
        return $data;
    }
}
