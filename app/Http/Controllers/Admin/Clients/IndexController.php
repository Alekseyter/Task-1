<?php

namespace App\Http\Controllers\Admin\Clients;

use App\Http\Controllers\Controller;
use App\Models\Client;

class IndexController extends Controller
{
    public function __invoke()
    {
        $clients = Client::paginate(6);
        $clientsAll = Client::all();

        return view('admin.clients.index', compact('clients', 'clientsAll'));
    }
}
