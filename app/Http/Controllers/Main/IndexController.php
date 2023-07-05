<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Http\Resources\Book\BookResource;
use App\Http\Resources\Post\PostResource;
use App\Models\Book;
use App\Models\Post;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke() {
        $data = [];
        $booksCount = Book::all()->count();
        $postCount = Post::all()->count();
        $data['random_books'] = $booksCount >= 4 ?
            BookResource::collection(Book::get()->random(4)) :
            BookResource::collection(Book::all()->take($booksCount));
        $data['latest_books'] = $booksCount >= 4 ?
            BookResource::collection(Book::orderBy('public_start', 'DESC')->get()->take(4)) :
            BookResource::collection(Book::orderBy('public_start', 'DESC')->get()->take($booksCount));
        $data['latest_posts'] = $postCount >= 4 ?
            PostResource::collection(Post::latest()->get()->take(4)) :
            PostResource::collection(Post::latest()->get()->take($postCount));
        return $data;
    }
}
