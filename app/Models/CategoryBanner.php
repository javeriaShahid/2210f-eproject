<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
class CategoryBanner extends Model
{
    protected $fillable = ['category_id' , 'title_1' , 'title_2' , 'color_1' , 'color_2' , 'image' , 'status'];
    use HasFactory;
    public function categories(){
        return $this->hasOne(Category::class , 'id' , 'category_id');
    }
}
