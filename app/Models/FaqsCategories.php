<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FaqsCategories extends Model
{
    use HasFactory;
    protected $fillable = ['name' , 'status'];
    public function faqs(){
        return $this->hasMany(FAQS::class , 'category' , 'id');
    }
}
