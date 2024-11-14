<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;
    protected $guarded = [
        
        'id'
    ];
    protected $casts = [
        'comment' => 'array', // Automatically cast 'tags' as an array
    ];
    // public function post(): BelongsTo
    // {
    //     return $this->belongsTo(Credential::class, 'username', 'username');
    // }

    //   public function comment(): HasMany
    // {
    //     return $this->hasMany(Comment::class, 'post_id', 'post_id');
    // }

}
