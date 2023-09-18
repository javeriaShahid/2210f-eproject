<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\usercontroller;
 

Route::controller(userController::class)->group(function () {
    Route::get('/', 'index');
    Route::post('/aboutus', 'about-us');
});



// class usercontroller extends Controller
// {
//    public function index(){
//     return view("index");
//    }
// }

// public function sign_up_logic(Request $request){
//  $user = new User;
//       $user->name = $request->name;
//       $user->email = $request->email;
//       $user->password= $request->pass;
//       $user->save();


// }
