<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Productimages extends Model
{
    use HasFactory ,SoftDeletes;
    protected $fillable = [
        'product_id' ,
        'image' ,
        'deleted_at'  ,
      ];
      public function product(){

        return $this->hasOne(Product::class ,'id' , 'product_id');
    
    }
}
