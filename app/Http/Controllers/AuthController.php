<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function auth(Request $request){
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Аутентификация успешна
            return redirect()->route('main.index');
        } else {
            // При неудачной попытке вернуть обратно с ошибкой
            return back()->withErrors(['email' => 'Неверный email или пароль']);
        }
    }

    public function logout(Request $request){
        Auth::logout();
        return redirect('/main');
    }
}
