<?php

namespace App\Http\Controllers\Admin\Genres;

use App\Http\Controllers\Controller;
use App\Models\BookGenre;
use Illuminate\Http\Request;

class UpdateController extends Controller
{
    public function __invoke(Request $request, BookGenre $genre)
    {
        $data = $request->all();
        $genre->update($data);
        return response()->json(['success' => 'success', 200, 'dataID' => $genre]);
    }
}
