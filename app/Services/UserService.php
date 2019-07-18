<?php 
namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\Http\Requests\UserCreateRequest;

use App\Repositories\UserRepository;


class UserService {

    protected $userRepository;    

    public function __construct(UserRepository $userRepository) {
        $this->userRepository = $userRepository;
    }
    
    public function create(UserCreateRequest $request) {
        $data['ok'] = true;
                
        $user = $this->userRepository->create([
            'name' => "", // just late it empty for now
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        $data['user'] = $user;
        
        return $data;
    }

    public function currentUser() {
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
            $user = $this->userRepository->findById(Auth::user()->id);
            $user->password = Hash::make($request->password);
            $user->save();
        }        

        return $data;
    }


}