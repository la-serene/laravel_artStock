<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model implements Authenticatable
{
    use \Illuminate\Auth\Authenticatable;
    use HasFactory;

    protected $fillable = [
        'user_id',
        'username',
        'password',
        'first_name',
        'last_name',
        'bio',
        'date_of_birth',
        'email',
        'gender',
        'phone_number',
        'avatar',
        'payment_method',
    ];
}
