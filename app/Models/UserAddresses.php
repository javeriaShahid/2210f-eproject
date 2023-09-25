<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAddresses extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id' ,
        'adressline1',
        'adressline2',
        'country',
        'state',
        'city',
        'postalcode',
        'phone_number1',  
        'phone_number2',  
      ];
    public function user()
    {
        return $this->hasOne(User::class ,'id' , 'user_id');
    }
}
