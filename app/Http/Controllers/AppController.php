<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Inertia\Response;

class AppController extends \Inertia\Controller {
    public function main(): Response {
        return Inertia::render('Main', [
            'title' => 'Main',
        ]);
    }
}
