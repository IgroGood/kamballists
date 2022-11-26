<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Traits\ApiResponser;
use Hash;
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
            'phone' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return $this->success(null, 'Успешно');
        }

        return $this->error('Неверный логин или пароль.', 403);
    }


    //устал пилить. буду колхозить
    //на хахатон пойдет
    public function registration(Request $request) {
        if(User::all()->where('phone', $request['phone'])->first() !== null)
            return $this->error('Пользователь с таким именем уже существует.', 403);
        if ($request['password'] !== $request['password2'])
            return $this->error('Пароли не совпадают.', 403);
        $request['password'] = Hash::make($request['password']);
        $credentials = $request->validate([
            'phone' => ['required'],
            'password' => ['required'],
        ]);
        $u = new User($credentials);
        $u->save();
        return $this->success('Пользователь создан!');
    }
}
