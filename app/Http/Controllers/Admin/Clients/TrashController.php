<?php

namespace App\Http\Controllers\Admin\Clients;

use App\Http\Controllers\Controller;
use App\Models\Client;

class TrashController extends Controller
{
    public function __invoke()
    {
        $clients = Client::onlyTrashed()->get();

        return view('admin.clients.trash', compact('clients'));
    }
}
