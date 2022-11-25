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

    public function organisations(): Response {
        return Inertia::render('Organizations', [
            'title' => 'Организации',
            'organisations' => Organisation::all(),
        ]);
    }

    public function organisation(int $id): Response {
        return Inertia::render('Organisation', [
            'title' => 'Организация',
            'organisation' => Organisation::find($id)->first(),
        ]);
    }

    public function create(Request $request): JsonResponse {
        $credentials = $request->validate([
            'organisation_name' => ['required'],
            'address' => ['required'],
        ]);

        $organisation = new Organisation([
            'organisation_name' => $credentials['organisation_name'],
            'address' => $credentials['address'],
        ]);

        $organisation->save();
        return $this->success('Организация добавлена.');
    }
}
