<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Contracts\Auth\CanResetPassword;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model implements Authenticatable, CanResetPassword
{
    use \Illuminate\Auth\Authenticatable;
    use \Illuminate\Auth\Passwords\CanResetPassword;
    use Notifiable;
    use HasFactory;

    protected $fillable = [
        'user_tag',
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
    public function comment(): HasMany
    {
        return $this->hasMany(Comment::class);
    }
    public function post(): HasMany
    {
        return $this->hasMany(Content::class);
    }
    public function getAvatarUrl(): string
    {
        if ($this->getAttribute('avatar') == null)
            return asset("/assets/img/default/avatar.jpg");
        else
            return $this->getAttribute('avatar');
    }
}
