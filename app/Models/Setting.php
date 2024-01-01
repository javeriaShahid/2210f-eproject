<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
    protected $fillable = ['logo' ,'i_frame_link', 'country_city', 'x_icon' , 'title' , 'contact' , 'email' , 'address' , 'map_link' , 'designed_by' ,'designed_year'];
}
