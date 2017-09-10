<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

class NewsletterController extends Controller
{
    public function register(Request $request){
        $this->validate($request, [
            'email' => 'required|email'
        ]);
        $client = new Client();
        $result = $client->post(config('api.api_url') . 'register-newsletter', [
            'verify' => false,
            'form_params' => [
                'email' => $request->email
            ]
        ]);
        $response = json_decode((string)$result->getBody());
        if($response && $response->status == 'OK'){
            $request->session()->flash('success-nl', true);
            $request->session()->flash('status-nl', 'Your email is on our list now!');
        }else{
            $request->session()->flash('success-nl', false);
            $request->session()->flash('status-nl', 'Your email is already on our list!');
        }
        
        return redirect('/contact-us');
    }
}
