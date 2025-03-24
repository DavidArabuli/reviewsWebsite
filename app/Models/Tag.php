<?php

namespace App\Models;

use App\Models\Game;
use App\Models\Review;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tag extends Model
{
    /** @use HasFactory<\Database\Factories\TagFactory> */
    use HasFactory;

    public function reviews()
    {
        return $this->belongsToMany(Review::class);
    }
    public function games()
    {
        return $this->belongsToMany(Game::class);
    }
}
