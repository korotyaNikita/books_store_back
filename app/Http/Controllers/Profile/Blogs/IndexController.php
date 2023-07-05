<?php

namespace App\Http\Controllers\Profile\Blogs;

use App\Http\Controllers\Controller;
use App\Http\Resources\Post\PostResource;
use App\Models\User;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke(User $user) {
        return PostResource::collection($user->posts);
    }
}
