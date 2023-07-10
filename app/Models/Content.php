<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\HasMany;

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

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function get_user()
    {
        return $this->user()->get()[0];
    }
    public function comment(): HasMany
    {
        return $this->hasMany(Comment::class, "post_id");
    }
}
