<?php

namespace App\Http\Controllers\Profile\Library;

use App\Http\Controllers\Controller;
use App\Http\Resources\Book\BookResource;
use App\Models\User;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke(User $user) {
        return BookResource::collection($user->library);
    }
}
