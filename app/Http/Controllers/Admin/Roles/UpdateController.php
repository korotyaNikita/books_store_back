<?php

namespace App\Http\Controllers\Admin\Roles;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;

class UpdateController extends Controller
{
    public function __invoke(Request $request, Role $role)
    {
        $data = $request->all();
        $role->update($data);
        return response()->json(['success' => 'success', 200, 'dataID' => $role]);
    }
}
