<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Credential extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    // protected $guarded = ['id'];
    protected $guarded = [
        
        'id'
    ];
    // public function user(): HasMany
    // {
    //     return $this->hasMany(Post::class, 'username', 'username');
    // }
}
