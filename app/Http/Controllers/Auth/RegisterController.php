<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    public function __invoke(Request $request) {

        $request->validate([
            'title' => 'required',
            'email' => 'required|email',
            'password' => 'required|regex:/(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}/u',
            'password_confirmation' => 'required|same:password'
        ], [
            'required' => 'Це обов\'язкове поле',
            'email' => 'Введіть email у форматі example@gmail.com',
            'password.regex' => 'Пароль має містити хоча б 8 символів, хоча б одну велику букву, хоча б одну маленьку букву і хоча б одну цифру',
            'same' => 'Паролі мають співпадати'
        ]);

        try {
            DB::beginTransaction();
            $user = User::create([
                'title' => $request->title,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'remember_token' => Str::random(40)
            ]);
            DB::commit();
        } catch (\Exception $exeption) {
            DB::rollBack();
            return response()->json([
                'status' => 500,
                'message' => 'Server error',
            ]);
        }

        $request->session()->regenerate();

        //$token = $user->createToken($user->email.'_Token')->plainTextToken;

        return response()->json([
            'status' =>200,
            'username' =>$user->title,
            'message' =>'Registered Successfully',
        ]);
    }
}
