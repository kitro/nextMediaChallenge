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
                
        if(self::checkEmailDuplicate($request->email)) {
            $data['msg'] = 'This email is registred before';
            return response()->json($data, 400);
        }

        $user = new User;
        $user->name = ""; // empty for now
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        $data['user'] = $user;
        
        return $data;
    }

    // check email duplication
    private function checkEmailDuplicate($email) {
        $user = User::where('email', $email)->first();
        if($user != null) {
            return true;
        }

        return false;
    }
}
