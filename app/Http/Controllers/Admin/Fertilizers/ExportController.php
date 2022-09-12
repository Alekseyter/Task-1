<?php

namespace App\Http\Controllers\Admin\Fertilizers;

use App\Exports\FertilizersExport;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

class ExportController extends Controller
{
    public function __invoke()
    {
        return Excel::download(new FertilizersExport(), 'fertilizers-export.xlsx');
    }
}
