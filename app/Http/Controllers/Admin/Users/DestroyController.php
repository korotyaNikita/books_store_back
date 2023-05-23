<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class DestroyController extends Controller
{
    public function __invoke(User $user)
    {
        $user->delete();
        return response()->json(['success' => 'success', 200]);
    }
}
