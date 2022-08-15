<?php

namespace App\Http\Controllers\Admin\ImportStatuses;

use App\Http\Controllers\Controller;
use App\Http\Requests\ImportStatuses\StoreRequest;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        dd(111);
//        $data = $request->validate($request->rules());
//        Client::firstOrCreate(['name' => $data['name']], $data);
//
//        return redirect()->route('admin.client.index');
    }
}
