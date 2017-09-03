<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

class CarController extends Controller
{
    public function index(Request $request){
        return view('car-collections');
    }

    public function detail(Request $request, $cid){
        $latitude = $request->input('lat', null);
        $longitude = $request->input('long', null);
        $client = new Client();
        $result = $client->get(config('api.api_url') . 'cars/'.$cid.'?lat='.$latitude.'&'.'long='.$longitude, [
            'verify' => false
        ]);
        $response = json_decode((string)$result->getBody());
        if($response->status != 'OK'){
            return back()->withInput();
        }
        return view('car-details')->with([
            'car' => $response->car
        ]);
        return view('car-details');
    }
}
