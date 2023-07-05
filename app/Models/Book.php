<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'books';
    protected $guarded = false;
    public $timestamps = false;

    public function images() {
        return $this->hasMany(Image::class, 'book_id', 'id');
    }

    public function users() {
        return $this->belongsTo(User::class, 'author_id', 'id');
    }

    public function genre() {
        return $this->belongsTo(BookGenre::class, 'book_genre_id', 'id');
    }

    public function content() {
        return $this->hasMany(Content::class, 'book_id', 'id');
    }

    public function comments() {
        return $this->belongsToMany(PostComment::class, 'book_comments', 'book_id', 'user_id');
    }

    public function reaction() {
        return $this->belongsToMany(BookUserReaction::class, 'book_user_reactions', 'book_id', 'user_id');
    }
}
