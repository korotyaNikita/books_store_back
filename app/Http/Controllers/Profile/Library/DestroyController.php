<?php

namespace App\Http\Controllers\Profile\Library;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Library;
use App\Models\User;
use Illuminate\Http\Request;

class DestroyController extends Controller
{
    public function __invoke(User $user, Book $book) {
        $user->library()->detach($book->id);
        return response()->json(['success' => 'success', 200]);
    }
}
