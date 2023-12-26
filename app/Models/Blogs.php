<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blogs extends Model
{
    use HasFactory;
    protected $fillable = ['image' , 'tags' , 'title' , 'description' ,'status' , 'user_id'];
    public function blogComments(){
        return $this->belongsTo(BlogComments::class , 'blog_id' , 'id');
    }
}
