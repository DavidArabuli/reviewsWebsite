<?php

namespace App\Models;

use App\Models\User;
use App\Models\Review;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Author extends Model
{

    use HasFactory;



    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
