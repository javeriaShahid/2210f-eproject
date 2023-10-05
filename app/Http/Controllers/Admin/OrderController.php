<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Checkout;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public $parentModel  =  Checkout::class ;
    public $cartModel    =  Cart::class ;
    public function index()
    {
        $data['checkout']   = $this->parentModel::with('product')->paginate(25);
        return view('Admin.Order.index')->with('data' , $data);
    }
    public function delivered()
    {
        $data['checkout']   = $this->parentModel::where('is_delivered' , 1)->with('product')->paginate(25);
        return view('Admin.Order.delivered')->with('data' , $data);
    }
    public function pending()
    {
        $data['checkout']   = $this->parentModel::where('is_delivered' , 0)->with('product')->paginate(25);
        return view('Admin.Order.pending')->with('data' , $data);
    }
    public function delivered_product($id = null)
    {
        $update    = $this->parentModel::where('tracking_id' , $id)->update([
            'is_delivered' => 1
        ]);

        if($update == true)
        {
            return redirect()->back()->with('success' , 'Order has been Delivered');
        }
        else
        {
            return redirect()->back()->with('error' , 'Failed To Delivery Order');
        }
    }
    public function delete($id =  null)
    {
        $checkout         = $this->parentModel::where('id' , $id)->first();
        $deleteCart       = $this->cartModel::where('id' , $checkout->cart_id)->forceDelete();
        $orderDelete      = $this->parentModel::where('id' , $id)->forceDelete();

        if($orderDelete == true)
        {
            return redirect()->back()->with('success' , 'Order has been Deleted');
        }
        else
        {
            return redirect()->back()->with('error' , 'Failed To Delete Order');
        }
    }
}
