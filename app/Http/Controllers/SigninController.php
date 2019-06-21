<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SigninController extends Controller
{
    // sign in
    public function signin(Request $request) {
        $http = new \GuzzleHttp\Client;
        try {
            $response = $http->post('192.168.2.132/nextMediaChallenge/public/oauth/token', [
                'form_params' => [
                    'grant_type' => 'password',
                    'client_id' => '4',
                    'client_secret' =>'FNQoVKQcB7Yrr5OKgkcC48ynpefIugiPULqssGI0',
                    'username' => $request->email,
                    'password' => $request->password,
                    'scope' => '*',
                ]
            ]);
            return $response->getBody();
        } catch (\GuzzleHttp\Exception\BadResponseException $e) {
			// return $e->getCode();
            if ($e->getCode() === 400) {
                return response()->json(['ok'=> false, 'erro'=> 'Invalid Request. Please enter a username or a password.'], $e->getCode());
            } else if ($e->getCode() === 401) {
                return response()->json('Your credentials are incorrect. Please try again', $e->getCode());
            }
            return response()->json('Something went wrong on the server.', $e->getCode());
        }
    }
}
