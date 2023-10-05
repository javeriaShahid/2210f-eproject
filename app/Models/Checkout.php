<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Checkout extends Model
{
    use HasFactory;
    protected $fillable = [
        'cart_id' ,
        'user_id' ,
        'payment_method',
        'total_price' ,
        'tracking_id' ,
        'address_id',
        'order_placed_date' ,
        'delivery_date',
        'is_delivered',
        'product_id',

      ];
    public function product()
    {
        return $this->hasOne(Product::class ,'id' , 'product_id');
    }

}
