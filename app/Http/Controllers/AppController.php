<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Inertia\Response;

class AppController extends \Inertia\Controller {
    public function map(): Response {
        return Inertia::render('Map', [
            'title' => 'Карта точек с безналичной оплатой',
            'script' => 'asdsd'
        ]);
    }
}
