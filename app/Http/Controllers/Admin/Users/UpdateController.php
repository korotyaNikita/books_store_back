<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UpdateController extends Controller
{
    public function __invoke(Request $request, User $user)
    {
        $data = $request->all();
        $request->validate([
            'title' => 'required',
            'email' => 'required|email',
            'password' => 'required|regex:/(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}/u',

        ], [
            'required' => 'Це обов\'язкове поле',
            'email' => 'Введіть email у форматі example@gmail.com',
            'password.regex' => 'Пароль має містити хоча б 8 символів, хоча б одну велику букву, хоча б одну маленьку букву і хоча б одну цифру',

        ]);

        try {
            DB::beginTransaction();
            $user->update($data);
            DB::commit();
        } catch (\Exception $exeption) {
            DB::rollBack();
            abort(500);
        }
        return response()->json(['success' => 'success', 200, 'dataID' => $user]);
    }
}
