<?php

namespace App\Http\Controllers;

use App\Models\Appeal;
use App\Models\Organisation;
use App\Models\User;
use App\Traits\ApiResponser;
use Auth;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class AppealController extends \Inertia\Controller {
    use ApiResponser;


    public function create(Request $request): JsonResponse {

        //Да ну эти проверки... зря начал)
        $credentials = $request->validate([
            'address' => ['required'],
            'latitude' => ['required'],
            'longitude' => ['required'],
            'description' => ['required'],
            'issues_id' => ['required'],
        ]);

        $appeal = new Appeal([
            'user_id' => Auth()->id(),
            'address' => $credentials['address'],
            'latitude' => $credentials['latitude'],
            'longitude' => $credentials['longitude'],
            'description' => $credentials['description'],
            'issues_id' => $credentials['issues_id'],
        ]);

        $appeal->save();
        return $this->success('Организация добавлена.');
    }
}
