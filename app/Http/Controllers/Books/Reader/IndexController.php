<?php

namespace App\Http\Controllers\Books\Reader;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke(Book $book) {
        return $book->content;
    }
}
