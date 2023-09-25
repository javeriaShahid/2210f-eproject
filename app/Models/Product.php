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
        'category_id',  
        'subcategory_id' ,
        'description' ,
        'price' ,
        'stock' ,
        'image' ,
        'is_published' ,
        'color_code' ,
        'sku' ,
        'deleted_at'
      ];
      public function category()
      {
          return $this->hasOne(Category::class , 'id' , 'category_id');
      }
    
      public function subcategory()
      {
          return $this->hasOne(Subcategory::class , 'id' , 'subcategory_id');
      }
}
