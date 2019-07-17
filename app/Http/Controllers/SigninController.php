<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SigninController extends Controller
{
    // sign in
    public function signin(Request $request) {
        $http = new \GuzzleHttp\Client;
        try {
            
            $end_point = '192.168.2.132/nextMediaChallenge/public/oauth/token';
            $client_id = "1";
            $client_secret = 'yJ83pf7USpbRNL7ph3tjLpd0rVNSzNeJ5PmFcGNF';

            $response = $http->post($end_point, [
                'form_params' => [
                    'grant_type' => 'password',
                    'client_id' => $client_id,
                    'client_secret' => $client_secret,
                    'username' => $request->email,
                    'password' => $request->password,
                    'scope' => '*',
                ]
            ]);
            return $response->getBody();
        } catch (\GuzzleHttp\Exception\BadResponseException $e) {
            // return $e->getCode();
            $data['ok'] = false;
            if ($e->getCode() === 400) {
                $data['msg'] = 'Invalid Request. Please enter a username or a password.';
                return response()->json($data, $e->getCode());
            } else if ($e->getCode() === 401) {
                $data['msg'] = 'Your credentials are incorrect. Please try again';
                return response()->json($data, $e->getCode());
            }

            $data['msg'] = 'Your credentials are incorrect. Please try again';
            return response()->json($data, $e->getCode());
        }
    }
}
