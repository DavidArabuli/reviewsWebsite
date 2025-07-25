<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'content', 'slug', 'user_id', 'screenshots', 'type'];
    protected $casts = [
        'screenshots' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
