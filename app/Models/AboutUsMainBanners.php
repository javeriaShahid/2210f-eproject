<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutUsMainBanners extends Model
{
    use HasFactory;
    protected $fillable = ['image' , 'video' , 'title' , 'description', 'status' ,'video_banner'];
}
