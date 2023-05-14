<?php

namespace App\Http\Controllers\Admin\Roles;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function __invoke(Request $request)
    {
        $data = $request->all();
        $dataId = Role::create($data);
        return response()->json(['success' => 'success', 200, 'dataID' => $dataId]);
    }
}
