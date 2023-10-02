<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Http\Request;
use App\Models\Checkout;
class Checkoutcontroller extends Controller
{
   public $parentModel   = Checkout::class;
   public $cartData      = Cart::class;
   public function index()
   {
        $data['cart']   = $this->cartData::where('user_id' , session()->get("user")['id'])->get();
        return view('User.checkout')->with('data' , $data);
   }
}
