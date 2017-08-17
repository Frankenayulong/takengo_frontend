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
}
