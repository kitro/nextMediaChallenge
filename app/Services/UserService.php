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

    public function findUserByEmail($email) {
        return $this->userRepository->findByEmail($email);
    }

    function updatePassword($id, $new_password) {
        $user = $this->userRepository->findById($id);
        $user->password = Hash::make($new_password);
        return $user->save();
    }

    // update password for current user
    public function updatePasswordCurrentUser(Request $request) {
        $data['ok'] = true;

        $user = Auth::user();

        // check passowrd
        if(!Hash::check($request->old_password, Auth::user()->password)) {
            $data['ok'] = false;
            $data['msg'] = "Password incorrect";
            return response()->json($data, 401);
        } else {
            $this->updatePassword(Auth::user()->id, $request->password);
        }

        return $data;
    }


}