<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DealsBanner extends Model
{
    protected $fillable  = ['image' , 'title' , 'short_description' , 'category_id' , 'percent_off' ,'status' , 'side' , 'title_color' , 'text_color'];
    use HasFactory;
    public function category(){
        return $this->hasOne(Category::class , 'id' , 'category_id');
    }
}
