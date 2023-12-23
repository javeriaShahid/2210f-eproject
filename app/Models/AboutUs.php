<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class AboutUs extends Model
{
    use HasFactory;
    protected $fillable = ['image' , 'short_title' , 'title' , 'category' , 'description' , 'side'];
    public function categories(){
        return $this->hasOne(Category::class,'id' , 'category');
    }
}
