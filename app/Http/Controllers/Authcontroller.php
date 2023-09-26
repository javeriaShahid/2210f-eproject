<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class Authcontroller extends Controller
{
    public function login(Request $request){
        $email = $request->email;
        $password = $request->password;
        $login = User::where('email', $email)->first();
        dd($login);

        
    }
}
