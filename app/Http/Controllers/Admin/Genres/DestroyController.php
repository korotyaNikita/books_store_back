<?php

namespace App\Http\Controllers\Admin\Genres;

use App\Http\Controllers\Controller;
use App\Models\BookGenre;
use Illuminate\Http\Request;

class DestroyController extends Controller
{
    public function __invoke(BookGenre $genre)
    {
        $genre->delete();
        return response()->json(['success' => 'success', 200]);
    }
}
