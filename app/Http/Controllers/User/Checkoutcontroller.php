<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Http\Request;
use App\Models\Checkout;
use Carbon\Carbon;
class Checkoutcontroller extends Controller
{
   public $parentModel   = Checkout::class;
   public $cartData      = Cart::class;
   public function index()
   {


    // $deliveryDates = [];
    // $deliveryDays  = [];
    // // Get the current date
    // $currentDate = Carbon::now();

    // // Calculate delivery dates based on the number of delivery days
    // for ($i = 0; $i <= $deliveryDays; $i++) {
    //     $deliveryDates[] = $currentDate->copy()->addDays($i)->toDateString();
    // }
    //     $data['DeliveryDate'] = end($deliveryDates);
        $data['cart']   = $this->cartData::where('user_id' , session()->get("user")['id'])->get();
        return view('User.checkout')->with('data' , $data);
   }

   public function store(Request $request)
   {
            $user_id   = session()->get('user')['id'] ;
            $cartId    = $request->productId ;

   }
}
