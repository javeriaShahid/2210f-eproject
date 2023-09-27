<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; // Ye link hai 

class Category extends Model
{
    use HasFactory , SoftDeletes; // Softdeletes ka use esleye karte hain take data parmentantly direct delete na ho woh deleted_at columns mai time lekh deta hai jesse data show nahi howa ese ham data restore karskte hain 
    protected $fillable = [
        'name' ,
        'deleted_at'  // woh columns aenge jo database ke tables mai hain hamare means migrations mai hai Id ko chorkar ok
    ];
    public function subcategory()
    {
        return $this->hasMany(Subcategory::class ,'category_id' , 'id');
    }
    public function product()
    {
        return $this->hasMany(Product::class , 'category_id' , 'id');
    }
}
