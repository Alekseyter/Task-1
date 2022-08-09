<?php

namespace App\Http\Controllers\Admin\Clients;

use App\Http\Controllers\Controller;
use App\Models\Client;

class IndexController extends Controller
{
    public function __invoke()
    {
        $clients = Client::paginate(6);
        $clients_all = Client::all();
        $clients_region = Client::all()->unique('region');

        return view('admin.clients.index', compact('clients', 'clients_all', 'clients_region'));
    }
}
