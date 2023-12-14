<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
