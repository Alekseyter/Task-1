<?php

namespace App\Http\Controllers\Admin\Fertilizers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Fertilizers\UpdateRequest;
use App\Models\Fertilizer;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, Fertilizer $fertilizer)
    {
        $data = $request->validate($request->rules());
        $fertilizer->update($data);

        return redirect()->route('admin.fertilizer.index');
    }
}
