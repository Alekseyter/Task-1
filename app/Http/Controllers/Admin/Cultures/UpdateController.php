<?php

namespace App\Http\Controllers\Admin\Cultures;

use App\Http\Controllers\Controller;
use App\Http\Requests\Cultures\UpdateRequest;
use App\Models\Culture;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, Culture $culture)
    {
        $data = $request->validate($request->rules());
        $culture->update($data);
        return redirect()->route('admin.culture.index');
    }
}
