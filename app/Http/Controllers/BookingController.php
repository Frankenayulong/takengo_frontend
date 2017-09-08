<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

class BookingController extends Controller
{
    public function show(Request $request, $cid){
        if($request->cookie('fe_token') === null || $request->cookie('fe_email') === null || $request->cookie('fe_uid') === null){
            return back();
        }
        $token = $request->cookie('fe_token');
        $email = $request->cookie('fe_email');
        $uid = $request->cookie('fe_uid');
        $client = new Client();
        $result = $client->post(config('api.api_url') . 'cars/book/'.$cid, [
            'verify' => false,
            'headers' => [
                'X-TKNG-UID' => $uid,
                'X-TKNG-TKN' => $token,
                'X-TKNG-EM'  => $email
            ],
            'form_params' => [
                'lat' => $request->input('lat'),
                'long' => $request->input('long')
            ]
        ]);
        $response = json_decode((string)$result->getBody());
        if($response->status != 'OK'){
            return back()->withInput();
        }
        return view('booking-page')->with([
            'car' => $response->car,
            'user' => $response->user,
            'bookings' => $response->bookings
        ]);
    }

    public function history(Request $request){
        if($request->cookie('fe_token') === null || $request->cookie('fe_email') === null || $request->cookie('fe_uid') === null){
            return back();
        }
        $page = $request->input('page', 1);
        $token = $request->cookie('fe_token');
        $email = $request->cookie('fe_email');
        $uid = $request->cookie('fe_uid');
        $client = new Client();
        $result = $client->post(config('api.api_url') . 'book/history?page='.$page, [
            'verify' => false,
            'headers' => [
                'X-TKNG-UID' => $uid,
                'X-TKNG-TKN' => $token,
                'X-TKNG-EM'  => $email
            ]
        ]);
        $response = json_decode((string)$result->getBody());
        // return json_encode($response);
        if($response->status != 'OK'){
            return back()->withInput();
        }
        $current_page = $response->bookings->current_page;
        $last_page = $response->bookings->last_page;
        $prev_page = null;
        $next_page = null;
        if($current_page > 1){
            $prev_page = $current_page - 1;
        }
        if($current_page < $last_page){
            $next_page = $current_page + 1;
        }
        return view('booking-history')->with([
            'history' => $response->bookings->data,
            'prev_page' => $prev_page,
            'next_page' => $next_page,
            'current_page' => $current_page,
            'last_page' => $last_page
        ]);
    }
}
