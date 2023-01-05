<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BasketBook extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'basket_books';
    protected $guarded = false;
}
