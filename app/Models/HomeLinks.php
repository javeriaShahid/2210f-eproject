<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeLinks extends Model
{
    use HasFactory;
    protected $fillable = ['route' , 'div_id' , 'sortId' , 'title'];
    
}
