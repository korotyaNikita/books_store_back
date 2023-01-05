<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BookGenre extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'book_genres';
    protected $guarded = false;
}
