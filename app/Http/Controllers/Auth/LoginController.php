<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function __invoke(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|regex:/(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}/u',
        ], [
            'required' => 'Це обов\'язкове поле',
            'email' => 'Введіть email у форматі example@gmail.com',
            'password.regex' => 'Пароль має містити хоча б 8 символів, хоча б одну велику букву, хоча б одну маленьку букву і хоча б одну цифру'
        ]);

        if (!Auth::attempt($credentials)) {
            throw ValidationException::withMessages([
                'email' => [
                   'Невірний логін або пароль'
                ],
                'password' => [
                    'Невірний логін або пароль'
                ]
            ]);
        }

        $request->session()->regenerate();

        return response()->json([
            'status' => 200,
            'message' => 'Login Successfully',
        ]);;
    }
}
