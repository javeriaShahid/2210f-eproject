<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blogs extends Model
{
    use HasFactory;
    protected $fillable = ['image' , 'tags' , 'title' , 'description' ,'status' , 'user_id' , 'blockqoute'];
    public function blogComments(){
        return $this->hasMany(BlogComments::class , 'blog_id' , 'id');
    }
    public function user(){
        return $this->hasOne(User::class ,'id' , 'user_id');
    }
}
