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
}
