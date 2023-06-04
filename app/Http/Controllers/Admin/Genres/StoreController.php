<?php

namespace App\Http\Controllers\Admin\Genres;

use App\Http\Controllers\Controller;
use App\Models\BookGenre;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function __invoke(Request $request)
    {
        $request->validate([
            'title' => 'required',
        ], [
            'required' => 'Це обов\'язкове поле'
        ]);

        $data = $request->all();
        $dataId = BookGenre::create($data);
        return response()->json(['success' => 'success', 200, 'dataID' => $dataId]);
    }
}
