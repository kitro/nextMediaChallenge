<?php 
namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\Http\Requests\UserLoginRequest;

use App\Repositories\UserRepository;

class AuthService {

    protected $userRepository;    

    public function __construct(UserRepository $userRepository) {
        $this->userRepository = $userRepository;
    }
    
    public function login(UserLoginRequest $request) {
        $data['ok'] = true;

        // find user by email
        $user = $this->userRepository->findByEmail($request->email);

        // user not found
        if(!$user) {
            $data['ok'] = false;
            $data['msg'] = "Email address or password is incorrect!";
            return response()->json($data, 422);
        }

        // check password
        if (!Hash::check($request->password, $user->password)) {
            $data['ok'] = false;
            $data['msg'] = "Email address or password is incorrect!";
            return response()->json($data, 422);
        }

        $data_request = [
                'grant_type' => 'password',
                'client_id' => $request->client_id,
                'client_secret' => $request->client_secret,
                'username' => $request->email,
                'password' => $request->password,
                'scope' => '*'
        ];

        $request = Request::create('/oauth/token', 'POST', $data_request);

        $response = app()->handle($request);
    
        // Check if the request was successful
        if ($response->getStatusCode() != 200) {
            $data['ok'] = false;
            $data['msg'] = "Email address or password is incorrect!";
            return response()->json($data, 422);
        }
    
        // grab the data from the response
        $response_data = json_decode($response->getContent());

        $data['access_token'] =  $response_data->access_token;
        $data['user'] =  $user;       
        
        return $data;    
    }

    public function currentUser() {
        $data['ok'] = true;

        $user = Auth::user();

        $data['user'] = $user;

        return $data;
    }

}