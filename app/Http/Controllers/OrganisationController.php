<?php

namespace App\Http\Controllers;

use App\Models\Organisation;
use App\Traits\ApiResponser;
use Auth;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class OrganisationController extends \Inertia\Controller {
    use ApiResponser;

    public function api_organisations(): JsonResponse {
        return $this->success(Organisation::all());
    }

    public function reviews($id): JsonResponse {
        $reviews = Organisation::find($id)->reviews()->get();
        return $this->success($reviews);
    }

    public function organisations(): Response {
        return Inertia::render('Organizations', [
            'title' => 'Организации',
            'organisations' => Organisation::all(),
        ]);
    }

    public function edit(int $id): JsonResponse {
        return $this->success('Отредактирована');
    }

    public function organisation(int $id): Response {
        return Inertia::render('Organisation', [
            'title' => 'Организация',
            'organisation' => Organisation::find($id),
        ]);
    }

    //фарш
    public function api_organisation(int $id) {
        return $this->success(Organisation::find($id));
    }

    public function create(Request $request): JsonResponse {
        $credentials = $request->validate([
            'organisation_name' => ['required'],
            'address' => ['required'],
            'description' => ['required'],
            'latitude' => ['required'],
            'longitude' => ['required'],
        ]);

        $organisation = new Organisation([
            'organisation_name' => $credentials['organisation_name'],
            'address' => $credentials['address'],
            'description' => $credentials['description'],
            'latitude' => $credentials['latitude'],
            'longitude' => $credentials['longitude'],
        ]);

        $organisation->save();
        return $this->success('Организация добавлена.');
    }
}
