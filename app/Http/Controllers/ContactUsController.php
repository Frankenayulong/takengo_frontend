<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

class ContactUsController extends Controller
{
    public function index(){
        return view('contact-us');
    }

    public function create(Request $request){
        $this->validate($request, [
            'name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|min:9|max:10',
            'content' => 'required'
        ]);
        $client = new Client();
        $result = $client->post(config('api.api_url') . 'contact-us', [
            'verify' => false,
            'form_params' => [
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'content' => $request->content
            ]
        ]);
        $response = json_decode((string)$result->getBody());
        if($response && $response->status == 'OK'){
            $request->session()->flash('success', true);
            $request->session()->flash('status', 'Your query has been received!');
        }else{
            $request->session()->flash('success', false);
            $request->session()->flash('status', 'Failed to send query!');
        }
        
        return redirect('/contact-us');
    }
}
