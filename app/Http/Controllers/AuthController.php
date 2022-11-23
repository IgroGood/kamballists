<?php

namespace App\Http\Controllers;

use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller {
    use ApiResponser;
    /**
     * Обработка попыток аутентификации.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request) {
        $credentials = $request->validate([
            'email' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return $this->success(null, 'Успешно');
        }

        return $this->error('Неверный логин или пароль.', 403);
    }

    public function logout() {
//        Session::flush();
//        Auth::logout();
//        return redirect()->route('index');

        dd(Session::forget('key'));
        Session::forget('key');
        if(!Session::has('key')) {
            return "signout";
        }
        session()->remove(session()->getId());
        dd(2);
        return redirect()->route('index');
//        auth()->user()->tokens()->delete();
//
//        return [
//            'message' => auth()->user()->tokens()
//        ];
    }
}
