<?php

namespace App\Http\Controllers\Admin\Fertilizers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Fertilizers\StoreRequest;
use App\Models\Fertilizer;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validate($request->rules());
        Fertilizer::firstOrCreate(['name' => $data['name']], $data);

        return redirect()->back();
    }
}
