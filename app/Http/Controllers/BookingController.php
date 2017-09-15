<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

class BookingController extends Controller
{
    public function show(Request $request, $cid){
        if($request->cookie('fe_token') === null || $request->cookie('fe_email') === null || $request->cookie('fe_uid') === null){
            return redirect('/cars');
        }
        $token = $request->cookie('fe_token');
        $email = $request->cookie('fe_email');
        $uid = $request->cookie('fe_uid');
        $client = new Client();
        $result = $client->post(config('api.api_url') . 'cars/'.$cid.'/book', [
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
        $response->bookings = array_filter($response->bookings, function($item){
            return $item !== null;
        });
        if(count($response->bookings) > 0){
            return redirect()->back();
        }
        return view('booking-page')->with([
            'car' => $response->car,
            'user' => $response->user,
            'bookings' => $response->bookings
        ]);
    }

    public function history(Request $request){
        if($request->cookie('fe_token') === null || $request->cookie('fe_email') === null || $request->cookie('fe_uid') === null){
            return redirect('/cars');
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
        $response->bookings->data = array_filter($response->bookings->data, function($item){
            if($item !== null && $item->car !== null){
                return $item;
            }
        });
        return view('booking-history')->with([
            'history' => $response->bookings->data,
            'prev_page' => $prev_page,
            'next_page' => $next_page,
            'current_page' => $current_page,
            'last_page' => $last_page
        ]);
    }
}
