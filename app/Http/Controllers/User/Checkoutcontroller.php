<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Http\Request;
use App\Models\Checkout;
use App\Models\Country;
use App\Models\UserAddresses;
use Carbon\Carbon;
use Illuminate\Support\Str;
class Checkoutcontroller extends Controller
{
   public $parentModel   = Checkout::class;
   public $cartData      = Cart::class;
   public $countryModel  = Country::class;
   public $addressModel  = UserAddresses::class;
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
        $data['country'] = $this->countryModel::all();
        return view('User.checkout')->with('data' , $data);
   }

   public function store(Request $request)
   {
            $user_id          = session()->get('user')['id'] ;
            $cartId           = $request->cart_ids ;
            $quantity         = $request->cart_quantity ;
            $payment_method   = $request->payment_method;
            // ADDRESS Variables
            $addressId        = $request->address_id;
            $streetAddress1   = $request->streetaddress1;
            $streetAddress2   = $request->streetaddress2;
            $country          = $request->country;
            $state            = $request->state;
            $city             = $request->city;
            $contact1         = $request->contactNumber1;
            $contact2         = $request->contactNumber2;
            $postalCode       = $request->postalcode;
            // Address Variables Ends here
            $OrderPlaceDate   = Carbon::now()->toDateString();
            $productIds       = [];
            $productId        = $this->cartData::whereIn('id' , $cartId)->with('product')->get();
            $totalAmount      = [];
            $totalFeeDelivery = 0;
            $deliveryDate     = $request->DeliveryDate;
            $finalDate        = [] ;
            foreach($deliveryDate as $deliveryDates)
            {
                $carbonParse  = Carbon::parse($deliveryDates);
                $finalDate[]   = $carbonParse->toDateString();
            }
            foreach($productId as $product)
            {
                $productData   = $product->product->id;
                $productIds[]  = $productData ;

            }
            $shippingFees  = [];
            foreach($productId as $key => $value)
            {
                if($productId[$key]->product->sale_status == 1)
                {
                    $price         = $productId[$key]->product->discounted_price;
                }
                else
                {
                    $price         = $productId[$key]->product->price;
                }
                $subtotal      = $price * $quantity[$key];
                $shippingFees[]  = $productId[$key]->product->shipping_fees;
                $totalAmount[] = $subtotal ;
            }
                // Getting Delivey Date

            if($addressId == "" || $addressId == null)
            {
                $addressCreate  =  $this->addressModel::create([
                    'user_id'           => $user_id ,
                    'addressline1'      => $streetAddress1 ,
                    'addressline2'      => $streetAddress2 ,
                    'phone_number1'     => $contact1 ,
                    'phone_number2'     => $contact2 ,
                    'country'           => $country ,
                    'state'             => $state ,
                    'city'              => $city ,
                    'postalcode'        => $postalCode ,
                ]);
                $addressId       = $addressCreate->id;
            }
            // Create Checkout
            foreach($cartId as $key => $value)
            {
                $trackingId       = rand(000000000000,999999999999) ;
                $createCheckout  =  $this->parentModel::create([
                    'cart_id'            => $cartId[$key] ,
                    'product_id'         => $productIds[$key] ,
                    'address_id'         => $addressId ,
                    'quantity'           => $quantity[$key] ,
                    'total_price'        => $totalAmount[$key],
                    'user_id'            => $user_id ,
                    'order_placed_date'  => $OrderPlaceDate ,
                    'delivery_date'      => $finalDate[$key],
                    'payment_method'     => $payment_method ,
                    'tracking_id'        => $trackingId ,
                    'shipping_fees'      => $shippingFees[$key]

                ]);

            }
            if($createCheckout == true)
            {
                foreach($cartId as $key => $value)
                {
                    $cartDelete     =  $this->cartData::where('id' , $cartId[$key])->forceDelete();
                }
                return redirect()->back()->with('success' , 'Order has been Placed!');
            }
            else
            {
                return redirect()->back()->with('error' , 'Failed to place order');

            }



   }
}
