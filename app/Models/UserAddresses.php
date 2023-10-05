<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAddresses extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id' ,
        'addressline1',
        'addressline2',
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
    public function country()
    {
        return $this->hasOne(Country::class ,'id' , 'country');
    }
    public function state()
    {
        return $this->hasOne(State::class ,'id' , 'state');
    }
    public function city()
    {
        return $this->hasOne(City::class ,'id' , 'city');
    }
}
