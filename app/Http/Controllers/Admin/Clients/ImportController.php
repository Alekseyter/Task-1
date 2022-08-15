<?php

namespace App\Http\Controllers\Admin\Clients;

use App\Http\Controllers\Controller;
use App\Jobs\ClientsImportJob;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImportController extends Controller
{
    public function __invoke(Request $request)
    {
        $clientsFilePath = Storage::put('excel', $request->file('clients'));
        ClientsImportJob::dispatch($clientsFilePath);

        return redirect()->back()->with('message', 'Данные импортируются');
    }
}
