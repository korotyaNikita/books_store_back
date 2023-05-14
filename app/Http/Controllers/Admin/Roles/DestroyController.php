<?php

namespace App\Http\Controllers\Admin\Roles;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;

class DestroyController extends Controller
{
    public function __invoke(Role $role)
    {
        $role->delete();
        return response()->json(['success' => 'success', 200]);
    }
}
