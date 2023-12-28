<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogComments extends Model
{
    use HasFactory;
    protected $fillable = ['user_id' , 'blog_id' , 'message' ,'subject'];
    public function blog(){
        return $this->hasOne(Blogs::class , 'id' , 'blog_id');
    }
    public function userdata(){
        return $this->hasOne(User::class ,'id' , 'user_id');
    }
}
