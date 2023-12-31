<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmailVerificationTable extends Model
{
    use HasFactory;
    protected $fillable = [
        'email_address' ,
        'verification_code',  
      ];
}
