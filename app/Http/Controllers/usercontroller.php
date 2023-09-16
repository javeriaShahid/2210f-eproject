<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class usercontroller extends Controller
{
   public function index(){
    return view("index");
   }
}

public function sign_up_logic(Request $request){
 $user = new User;
      $user->name = $request->name;
      $user->email = $request->email;
      $user->password= $request->pass;
      $user->save();


}
