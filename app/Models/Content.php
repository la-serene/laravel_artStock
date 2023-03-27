<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Content extends Model
{
    use HasFactory;

//    protected function ownerUsername(): Attribute
//    {
//        return Attribute::make(
//            get: fn (Content $post) => User::find($post->content_owner_id)->username
//        );
//    }

    public function owner(): BelongsTo
    {
        return $this->belongsTo(User::class, 'content_owner_id', 'user_id');
    }
}
