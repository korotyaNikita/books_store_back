<?php

namespace App\Http\Controllers\Books;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Image;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StoreController extends Controller
{
    public function __invoke(Request $request) {
        $data = $request->all();
        $image = $data['cover'];
        unset($data['cover']);
        $data['public_start'] = Carbon::now();
        try {
            DB::beginTransaction();
            $book = Book::create($data);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return $e;
        }
        $name = md5(Carbon::now() . '_' . $image->getClientOriginalName()) . '.' . $image->getClientOriginalExtension();
        $filePath = Storage::disk('public')->putFileAs('/images', $image, $name);

        Image::create([
            'path' => $filePath,
            'url' => url('/storage/' . $filePath),
            'book_id' => $book->id
        ]);

        return response()->json(['success' => 'success', 200, 'dataID' => $book]);
    }
}
