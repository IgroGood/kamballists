<?php
namespace App\Http\Actions\Executive;

use App\Http\Requests\CreateSlotRequest;

class CreateExecutiveAction {
    public function create(CreateSlotRequest $request){
        $request->validated();
        //(new Executive($request->validated()))->save();
    }
}
