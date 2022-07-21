<?php

namespace App\Http\Controllers\Admin\Clients;

use App\Http\Controllers\Controller;
use App\Http\Requests\Clients\StoreRequest;
use App\Models\Client;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validate($request->rules());
        Client::firstOrCreate(['name' => $data['name']], $data);

        return redirect()->route('admin.client.index');
    }
}
