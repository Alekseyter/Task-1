<?php

namespace App\Http\Controllers\Admin\Clients;

use App\Http\Controllers\Controller;
use App\Http\Filters\ClientFilter;
use App\Http\Requests\Clients\FilterRequest;
use App\Models\Client;

class FilterController extends Controller
{
    public function __invoke(FilterRequest $request)
    {
        $data = $request->validated();
        $filter = app()->make(ClientFilter::class, ['queryParams' => array_filter($data)]);
        $clients = Client::filter($filter)->paginate(6);

        $clients_all = Client::all();
        $clients_region = Client::all()->unique('region');

        return view('admin.clients.index', compact('clients', 'clients_all', 'clients_region'));
    }

    public function sortName()
    {
        $clients = Client::orderBy('name', 'ASC')->paginate(6);
        $clients_all = Client::all();
        $clients_region = Client::all()->unique('region');

        return view('admin.clients.index', compact('clients', 'clients_all', 'clients_region'));
    }

    public function sortPriceDown()
    {
        $clients = Client::orderBy('price', 'ASC')->paginate(6);
        $clients_all = Client::all();
        $clients_region = Client::all()->unique('region');

        return view('admin.clients.index', compact('clients', 'clients_all', 'clients_region'));
    }

    public function sortPriceUp()
    {
        $clients = Client::orderBy('price', 'DESC')->paginate(6);
        $clients_all = Client::all();
        $clients_region = Client::all()->unique('region');

        return view('admin.clients.index', compact('clients', 'clients_all', 'clients_region'));
    }
}
