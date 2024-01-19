<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FAQS extends Model
{
    use HasFactory;
    protected $fillable = ['status' , 'title' , 'answer' , 'category'];
    public function categories(){
        return $this->hasOne(FaqsCategories::class,'id' , 'category');
    }
}
