<?php

namespace App\Http\Controllers;


use DB;
use Inertia\Inertia;
use Inertia\Response;


class PageController extends Controller {

    public function login(): Response {
        return Inertia::render('Login', [
            'title' => 'Login',
        ]);
    }
}
