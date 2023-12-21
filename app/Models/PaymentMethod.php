<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentMethod extends Model
{
    use HasFactory;
    protected $fillable = ['image' , 'name' , 'getway_type' ,'api_key' , 'secret_key' , 'callback_url' , 'additional_settings'];
}
