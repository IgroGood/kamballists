<?php

namespace App\Http\Controllers;

use App\Models\Organisation;
use App\Models\User;
use Inertia\Inertia;
use Inertia\Response;

class AppController extends \Inertia\Controller {
    public function map(): Response {
        return Inertia::render('Map', [
            'title' => 'Карта точек с безналичной оплатой',
            'organisations' => Organisation::all(),
        ]);
    }

    public function avatar(): Response {
        return Inertia::render('Avatar', [
            'title' => 'Аватар',
        ]);
    }

    public function partners(): Response {
        return Inertia::render('Partners', [
            'title' => 'Друзья',
        ]);
    }

    public function profile(): Response {
        return Inertia::render('Profile', [
            'title' => 'Профиль',
            'user' => auth()->user(),
            'appeals' => auth()->user()->appeals(),
        ]);
    }
}
