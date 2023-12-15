<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
class CarouselSetting extends Model
{
    use HasFactory;
    protected $fillable  = [
       'image' ,
       'main_title',
       'tag_1' ,
       'tag_2' ,
       'category_id' ,
       'description'
    ];
    public function categories(){
        return $this->hasOne(Category::class , 'id' , 'category_id');
    }
}
