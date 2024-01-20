<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;
    protected $fillable = ['user_id' , 'message'  , 'rating' , 'product_id'];
    public function user()
    {
       return $this->hasOne(User::class , 'id' , 'user_id');
    }
    public function products(){
        return $this->hasOne(Product::class , 'id' , 'product_id');
    }
    public function replies(){
        return $this->hasMany(ReplyFeedback::class, 'feedback_id' , 'id');
    }
}
