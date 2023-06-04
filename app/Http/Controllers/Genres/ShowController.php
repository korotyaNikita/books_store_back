<?php

namespace App\Http\Controllers\Genres;

use App\Http\Controllers\Controller;
use App\Models\BookGenre;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    public function __invoke(BookGenre $genre)
    {
        return $genre;
    }
}
