<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BookComment extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'book_comments';
    protected $guarded = false;
}
