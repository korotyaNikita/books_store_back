<?php

namespace App\Http\Controllers\Admin\Roles;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StoreController extends Controller
{
    public function __invoke(Request $request)
    {
        $request->validate([
            'title' => 'required',
        ], [
            'required' => 'Це обов\'язкове поле'
        ]);

        $data = $request->all();
        try {
            DB::beginTransaction();
            $dataId = Role::create($data);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            abort(500);
        }
        return response()->json(['success' => 'success', 200, 'dataID' => $dataId]);
    }
}
