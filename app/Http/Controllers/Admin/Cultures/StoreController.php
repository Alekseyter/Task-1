<?php

namespace App\Http\Controllers\Admin\Cultures;

use App\Http\Controllers\Controller;
use App\Http\Requests\Cultures\StoreRequest;
use App\Models\Culture;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validate($request->rules());
        Culture::firstOrCreate(['name' => $data['name']], $data);

        return redirect()->back();
    }
}
