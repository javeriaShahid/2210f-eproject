<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;

class usercontroller extends Controller
{
   public $countryModel    = Country::class ;
   public function Auth_register(){
    return view("admin.Auth_register");
   }
   public function Auth_login(){
      return view("admin.Auth_login");
     }
   public function dashboard(){
      return view("user.dashboard");
     }
   public function about_us(){
      return view("user.about_us");
     }
   public function accordion(){
      return view("user.accordion");
     }
   public function blog_details(){
      return view("user.blog_details");
     }
   public function blog(){
      return view("user.blog");
     }
   
   public function category(){
      return view("user.category");
     }
   public function contact(){
      return view("user.contact");
     }
   public function error(){
      return view("user.error");
     }
   public function faq(){
      return view("user.faq");
     }
   public function gift_card(){
      return view("user.gift_card");
     }
   public function myaccount(){
      return view("user.myaccount");
     }
   public function our_brand(){
      return view("user.our_brand");
     }
   public function quick_view(){
      return view("user.quick_view");
     }
   public function slider(){
      return view("user.slider");
     }
   public function standard(){
      return view("user.standard");
     }
   public function wishlist(){
      return view("user.wishlist");
     }
   public function registration(){
      $data['country']    = $this->countryModel::all();
      return view("user.registration")->with('data'  , $data);
     }

   public function login(){
      return view("user.login");
   }
}





// Route::controller(userController::class)->group(function () {
//     Route::get('/', 'index');
//     Route::post('/aboutus', 'about-us');
// });

