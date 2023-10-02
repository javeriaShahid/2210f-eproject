<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Http\Request;

class Cartcontroller extends Controller
{   public $parentModel   = Cart::class;
    public function index()
    {
        $data['cart']              =  $this->parentModel::where('user_id' , session()->get('user')['id'])->with('product')->paginate(5);
    
        return view("User.cart")->with('data' , $data);
    }
    public function store($id = null )
    {
        $cartdata    = $this->parentModel::where('product_id' , $id)->count();
        $Quantity    = $this->parentModel::where('product_id' , $id)->first();
        if($cartdata >= 1)
        {   $incrementedQuantity  = $Quantity->quantity + 1;
            $addToCart    = $this->parentModel::where('product_id' , $id)->update([
                'quantity'  => $incrementedQuantity,
            ]);
            $cart_count    = $this->parentModel::where('user_id' , session()->get('user')['id'])->count();
            if($addToCart == true)
            {
                return response()->json(['message' => 'success' , 'total_cart' => $cart_count]);
            }
            else
            {
                return response()->json(['message'=>'error']);
            }
        }
        else{

            $userId       = session()->get('user')['id'];
            $addToCart    = $this->parentModel::create([
                'product_id'   => $id,
                'user_id'      => $userId ,
                'quantity'     => 1
            ]);
            if($addToCart == true)
            {
                $cart_count    = $this->parentModel::where('user_id' , session()->get('user')['id'])->count();
                if($addToCart == true)
                {
                    return response()->json(['message' => 'success' , 'total_cart' => $cart_count]);
                }
            }
            else
            {
                return response()->json('error');
            }
        }

    }
    public function cart_error()
    {
        return redirect(Route('login.view'))->with('error' , 'Login Before adding Product to cart');
    }
    public function delete($id  = null)
    {
        $delete        =  $this->parentModel::where('id' , $id)->forceDelete();
        $totalPrice    = 0 ;
        $fees          = 0 ;
        $cartAllData   = $this->parentModel::with('product')->get();
        if($delete == true)
        {
            if($cartAllData->count() >= 1)
            {
              
        foreach($cartAllData as $cart){
            $fees  += $cart->product->shipping_fees ;
            $price   = 0 ;
            if($cart->product->sale_status  == 1)
            {
                $price = $cart->discounted_price * $cart->quantity ;
            }
            else
            {
                $price = $cart->product->price * $cart->quantity ;
            }
            $totalPrice += $price ;
            $cart_count    = $this->parentModel::where('user_id' , session()->get('user')['id'])->count();
            return response(['message' => 'success' , 'fees' => $fees , 'total' => $totalPrice , 'total_cart' => $cart_count]);
          }
          
      
        }
        // if cart is empty
        else
        {
            $cart_count    = $this->parentModel::where('user_id' , session()->get('user')['id'])->count();
            return response(['message' => 'success' , 'fees' => $fees , 'total' => $totalPrice , 'total_cart' => $cart_count]);
        }
        }
        else
        {
            echo "error";
        }
      
    }

    public function increment($id = null)
    {
        $cartData   =  $this->parentModel::where('id' , $id)->with('product')->first();
        $incrementedQuantity = $cartData->quantity + 1 ;
        // dd($incrementedQuantity);
        $updateCart  = $this->parentModel::where('id' , $id)->update([
            'quantity' => $incrementedQuantity ,
        ]);
       if($updateCart == true)
       {
        $newcartData   =  $this->parentModel::where('id' , $id)->with('product')->first();
         
        $productPrice  = 0 ;
        if($newcartData->product->sale_status  == 1)
        {
            $productPrice = $newcartData->product->discounted_price ;
        }
        if($newcartData->product->sale_status  == 0)
        {
            $productPrice = $newcartData->product->price ;
        }
        $updatedQuantity  = $newcartData->quantity;
        $fees             = 0;
        $totalPrice       = $productPrice * $newcartData->quantity ;
        $subTotal         =  0;
        $allCart          = $this->parentModel::all();
        $subTotal         = 0 ;
        foreach($allCart as $cart)
        {   $price    = 0 ;
            $fees    += $cart->product->shipping_fees;
            if($cart->product->sale_status  == 1)
            {
                $price  = $cart->product->discounted_price * $cart->quantity ;
            }
            else
            {
                $price = $cart->product->price * $cart->quantity;
            }
            $subTotal += $price ;
        }
        return response()->json(['subTotal'=>$subTotal , 'fees'=>$fees ,'message' => 'success' , 'quantity' => $updatedQuantity , 'total' => $totalPrice ]);
        
    }
      
        
    }

    //Decrement Quantit
    
    public function decrement($id = null)
    {
        $cartData   =  $this->parentModel::where('id' , $id)->with('product')->first();
        if($cartData->quantity > 1)
        {
            $incrementedQuantity = $cartData->quantity - 1 ;
            // dd($incrementedQuantity);
            $updateCart  = $this->parentModel::where('id' , $id)->update([
                'quantity' => $incrementedQuantity ,
            ]);
           if($updateCart == true)
           {
            $newcartData   =  $this->parentModel::where('id' , $id)->with('product')->first();
             
            $productPrice  = 0 ;
            if($newcartData->product->sale_status  == 1)
            {
                $productPrice = $newcartData->product->discounted_price ;
            }
            if($newcartData->product->sale_status  == 0)
            {
                $productPrice = $newcartData->product->price ;
            }
            $updatedQuantity  = $newcartData->quantity;
            $fees             = 0;
            $totalPrice       = $productPrice * $newcartData->quantity ;
            $subTotal         =  0;
            $allCart          = $this->parentModel::all();
            $subTotal         = 0 ;
            foreach($allCart as $cart)
            {   $price    = 0 ;
                $fees    += $cart->product->shipping_fees;
                if($cart->product->sale_status  == 1)
                {
                    $price  = $cart->product->discounted_price * $cart->quantity ;
                }
                else
                {
                    $price = $cart->product->price * $cart->quantity;
                }
                $subTotal += $price ;
            }
            return response()->json(['subTotal'=>$subTotal , 'fees'=>$fees ,'message' => 'success' , 'quantity' => $updatedQuantity , 'total' => $totalPrice ]);
            
        }
    }
      
        else
        {
            return response()->json(['message' => 'error']);
        }
        
    }
}
