<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Content extends Model
{
    use HasFactory;
    use HasUuids;

    protected $table = "posts";

    protected $fillable = [
        'id',
        'media',
        'title',
        'caption',
        'prompt',
        'postOwner_id',
    ];

    public function owner(): BelongsTo
    {
        return $this->belongsTo(User::class, 'content_owner_id', 'user_id');
    }
}
