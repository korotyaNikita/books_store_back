<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function __invoke(Request $request)
    {
        $data = $request->all();
        $dataId = User::create($data);
        return response()->json(['success' => 'success', 200, 'dataID' => $dataId]);
    }
}
