<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MailSetting extends Model
{
    use HasFactory;
    protected $fillable = [
        "smtp_email",
        "smtp_server",
        "smtp_port",
        "smtp_user" ,
        "smtp_password"
    ];
}
