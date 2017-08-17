<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function show(){
        return view('user-profile');
    }

    public function edit(){
        $user = [];
        return view('user-profile-edit')->with('user', $user);
    }

    public function update(Request $request){
        $this->validate($request, [
            'first_name' => '',
            'last_name' => '',
            'gender' => '',
            'phone' => '',
            'birth_date' => '',
            'address' => '',
            'city' => '',
            'state' => '',
            'post_code'
        ]);
        return $request->all();
        
        return redirect('/');
    }
}
