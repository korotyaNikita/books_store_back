<?php

namespace App\Http\Controllers\Profile\Library;

use App\Http\Controllers\Controller;
use App\Http\Resources\Library\LibraryResource;
use App\Models\Library;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StoreController extends Controller
{
    public function __invoke(Request $request) {
        $data = $request->all();
        try {
            DB::beginTransaction();
            $library = Library::create($data);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            abort(500);
        }
        return response()->json(['success' => 'success', 200, 'dataID' => new LibraryResource($library)]);
    }
}
