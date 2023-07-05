<?php

namespace App\Http\Controllers\Profile\Blogs;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StoreController extends Controller
{
    public function __invoke(Request $request) {
        $data = $request->all();

        try {
            DB::beginTransaction();
            $post = Post::create($data);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            abort(500);
        }

        return response()->json(['success' => 'success', 200, 'dataID' => $post]);
    }
}
