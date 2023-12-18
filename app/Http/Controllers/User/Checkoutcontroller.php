<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Http\Request;
use App\Models\Checkout;
use App\Models\Country;
use App\Models\UserAddresses;
use Carbon\Carbon;
use App\Models\Product;
use Illuminate\Support\Str;
use App\Models\Notification;
use function GuzzleHttp\json_decode;

class Checkoutcontroller extends Controller
{
   public $parentModel   = Checkout::class;
   public $cartData      = Cart::class;
   public $countryModel  = Country::class;
   public $addressModel  = UserAddresses::class;
   public $productModel  = Product::class ;
   public $notification  = Notification::class;
   public function index()
   {
        $data['cart']   = $this->cartData::where('user_id' , session()->get("user")['id'])->get();
        $data['country'] = $this->countryModel::all();
        return view('User.checkout')->with('data' , $data);
   }
   public function order_placed_view(Request $request)
   {
    $queryData = json_decode($request->query('data'), true);

    // Assuming 'id' is an array of IDs in each sub-array
    $checkoutIds = array_column($queryData, 'id');
    $ids  = [];
    // For demonstration, let's simply display the  IDs
    foreach ($checkoutIds as $id) {
        $ids[]= $id ;
    }

    $data['checkout']   = $this->parentModel::whereIn('id', $ids)->with('product')->get();
    return view('User.orderplaced')->with('data' , $data);
   }
   public function store(Request $request)
   {
            $user_id          = session()->get('user')['id'] ;
            $cartId           = $request->cart_ids ;
            $quantity         = $request->cart_quantity ;
            $payment_method   = $request->payment_method;
            $customer_name    = $request->name;
            $customer_email   = $request->email;
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
            $data['checkout']  = [];
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
                    'shipping_fees'      => $shippingFees[$key] ,
                    'customer_name'      => $customer_name ,
                    'customer_email'     => $customer_email

                ]);
                $data['checkout'][] = $createCheckout;

            }

            if($createCheckout == true)
            {
                $Product        =  $this->cartData::whereIn('product_id' , $productIds)->get();
                foreach($Product as $key => $value)
                {

                    $minusStock     = $Product[$key]->product->stock -  $Product[$key]->quantity ;
                    $plusSales      = $Product[$key]->product->number_of_sales +  $Product[$key]->quantity ;
                    $updateProduct  =    $this->productModel::where('id' , $Product[$key]->product->id)->update([
                        'stock'           => $minusStock ,
                        'number_of_sales' => $plusSales
                    ]);
                }
                foreach($cartId as $key => $value)
                {
                    $cartDelete     =  $this->cartData::where('id' , $cartId[$key])->forceDelete();
                }
                $currentTime = Carbon::now();
                $storeNotification = $this->notification::create([
                    'subject' => 'Order Has Been Placed',
                    'route' => Route('admin.order.index'),
                    'message' => "$customer_name Has Placed Order at $currentTime",
                ]);
                 return redirect(route('checkout.done' , ['data' => json_encode($data['checkout'])]));
            }
            else
            {
                return redirect()->back()->with('error' , 'Failed to place order');

            }



   }
}
