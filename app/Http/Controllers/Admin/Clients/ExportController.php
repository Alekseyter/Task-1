<?php

namespace App\Http\Controllers\Admin\Clients;

use App\Exports\ClientsExport;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

class ExportController extends Controller
{
    public function __invoke()
    {
        return Excel::download(new ClientsExport(), 'clients-export.xlsx');
    }
}
