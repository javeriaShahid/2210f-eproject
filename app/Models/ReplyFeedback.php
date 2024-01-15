<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReplyFeedback extends Model
{
    use HasFactory;
    protected $fillable = ['message' , 'admin_id' , 'feedback_id'];
    public function users(){
           return $this->hasOne(User::class , 'id' , 'user_id');
    }

    public function admins(){
        return $this->hasOne(User::class , 'id' , 'admin_id');
    }
}
