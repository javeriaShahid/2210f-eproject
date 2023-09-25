<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;
    protected $fillable = [
        'name' ,
        'country_id' , 
        'state_id' , 
      ];
      public function country()
      {
        return $this->hasOne(Country::class , 'id' , 'country_id');
      }
      public function state()
      {
        return $this->hasOne(State::class , 'id' , 'state_id');
      }
}
