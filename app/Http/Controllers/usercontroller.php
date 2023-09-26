<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\usercontroller;


class usercontroller extends Controller
{
   public function index(){
    return view("index");
   }
   public function login(){
      return view("login");
     }
   public function dashboard(){
      return view("dashboard");
     }
   public function about_us(){
      return view("about_us");
     }
   public function accordion(){
      return view("accordion");
     }
   public function blog_details(){
      return view("blog_details");
     }
   public function blog(){
      return view("blog");
     }
   public function cart(){
      return view("cart");
     }
   public function checkout(){
      return view("checkout");
     }
   public function category(){
      return view("category");
     }
   public function contact(){
      return view("contact");
     }
   public function error(){
      return view("error");
     }
   public function faq(){
      return view("faq");
     }
   public function gift_card(){
      return view("gift_card");
     }
   public function myaccount(){
      return view("myaccount");
     }
   public function our_brand(){
      return view("our_brand");
     }
   public function quick_view(){
      return view("quick_view");
     }
   public function slider(){
      return view("slider");
     }
   public function standard(){
      return view("standard");
     }
   public function wishlist(){
      return view("wishlist");
     }
   public function registration(){
      return view("registration");
     }
}





// Route::controller(userController::class)->group(function () {
//     Route::get('/', 'index');
//     Route::post('/aboutus', 'about-us');
// });





