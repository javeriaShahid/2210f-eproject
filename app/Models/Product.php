<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory ,SoftDeletes;
    protected $fillable = [
        'name' ,
        'brand_id' ,
        'category_id',
        'subcategory_id' ,
        'description' ,
        'price' ,
        'stock' ,
        'image' ,
        'is_published' ,
        'color_code' ,
        'sku' ,
        'deleted_at' ,
        'shipping_fees' ,
        'weight',
        'short_description',
        'weight_type',
        'delivery_duration'
      ];
      public function category()
      {
          return $this->hasOne(Category::class , 'id' , 'category_id');
      }

      public function subcategory()
      {
          return $this->hasOne(Subcategory::class , 'id' , 'subcategory_id');
      }
      public function productimages(){
        return $this->hasMany(Productimages::class ,'product_id' , 'id');
      }
      public function brand()
      {
        return $this->hasOne(Brand::class , 'id' , 'brand_id');
      }
}
