<?php

namespace App\Models;

use App\Models\Author;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Review extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'content', 'author_id'];
    // to disable all "fillable" protection functionality
    // protected $guarded = [];

    public function author()
    {
        return $this->belongsTo(Author::class);
    }
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
