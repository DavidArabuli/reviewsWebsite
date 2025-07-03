<?php

namespace App\Models;

use App\Models\User;
use App\Models\Author;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Review extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'content', 'user_id', 'score', 'game_id', 'steam_id', 'screenshots'];
    // to disable all "fillable" protection functionality
    // protected $guarded = [];
    protected $casts = [
        'screenshots' => 'array',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
    public function game()
    {
        // return $this->belongsTo(Game::class);
        return $this->belongsTo(Game::class)->withTrashed();
    }
}
