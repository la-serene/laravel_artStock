<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;

    protected $fillable = [
        'admin_id',
        'username',
        'password',
        'first_name',
        'last_name',
        'email',
        'gender',
        'phone_number',
        'avatar',
        'payment_method',
        'permission',
    ];
}
