<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BookTag extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'book_tags';
    protected $guarded = false;
}
