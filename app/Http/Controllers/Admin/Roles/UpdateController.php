<?php

namespace App\Http\Controllers\Admin\Roles;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UpdateController extends Controller
{
    public function __invoke(Request $request, Role $role)
    {
        $request->validate([
            'title' => 'required',
        ], [
            'required' => 'Це обов\'язкове поле'
        ]);

        $data = $request->all();
        try {
            DB::beginTransaction();
            $role->update($data);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            abort(500);
        }
        
        return response()->json(['success' => 'success', 200, 'dataID' => $role]);
    }
}
