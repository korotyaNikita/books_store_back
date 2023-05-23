<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    public function __invoke(User $user)
    {
        $user->role_id = $user->roles()->first()->title;
        return $user;
    }
}
