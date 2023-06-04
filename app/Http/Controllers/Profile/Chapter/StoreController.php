<?php

namespace App\Http\Controllers\Profile\Chapter;

use App\Http\Controllers\Controller;
use App\Models\Content;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StoreController extends Controller
{
    public function __invoke(Request $request) {
        $data = $request->all();
        try {
            DB::beginTransaction();
            $content = Content::create($data);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return $e;
        }
        return response()->json(['success' => 'success', 200, 'dataID' => $content]);
    }
}
