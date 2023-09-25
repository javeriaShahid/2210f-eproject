<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subcategory extends Model
{
    use HasFactory , SoftDeletes;
    protected $fillable = [
        'category_id',
        'name' ,
        'deleted_at'  ,
      ];

    public function category() // Ye Ek Basic eloquent query hai jese hum ek table ya model ko dosre se connect karenge ok
    {
        return $this->hasMany(Category::class , 'id' , 'category_id'); // ab es query mai jo $this haiwoh hamara current model hai hum esme hasMany ka use karhe hai means esme Ek se zeyada same category id ke subcategories hone fir Andar hum os Class ya Model ko call krhe hai or kehrhe hain ke eska jo Id hoga  woh hamare es column se match karega jo ke hamara category_id hai ok
    }
}
