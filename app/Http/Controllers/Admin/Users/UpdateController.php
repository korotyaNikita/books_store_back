<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UpdateController extends Controller
{
    public function __invoke(Request $request, User $user)
    {
        $data = $request->all();
        $user->update($data);
        return response()->json(['success' => 'success', 200, 'dataID' => $user]);
    }
}
