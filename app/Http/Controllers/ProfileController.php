<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

class ProfileController extends Controller
{
    public function show(Request $request){
        $user = [];
        
        if($request->cookie('fe_token') === null || $request->cookie('fe_email') === null || $request->cookie('fe_uid') === null){
            return response()->json([
                'status' => 'nocookie'
            ]);
        }
        $token = $request->cookie('fe_token');
        $email = $request->cookie('fe_email');
        $uid = $request->cookie('fe_uid');

        $client = new Client();
        $result = $client->post(config('api.api_url') . 'profile', [
            'verify' => false,
            'headers' => [
                'X-TKNG-UID' => $uid,
                'X-TKNG-TKN' => $token,
                'X-TKNG-EM'  => $email
            ]
        ]);
        $response = json_decode((string)$result->getBody());
        return view('user-profile')->with('user', $response->user);
    }

    public function edit(){
        $user = [];
        return view('user-profile-edit')->with('user', $user);
    }

    public function dashboard(){
        return view('dashboard');
    }
}
