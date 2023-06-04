<?php

namespace App\Http\Controllers\Genres;

use App\Http\Controllers\Controller;
use App\Models\BookGenre;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke()
    {
        return BookGenre::all();
    }
}
