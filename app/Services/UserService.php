<?php 
namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

}