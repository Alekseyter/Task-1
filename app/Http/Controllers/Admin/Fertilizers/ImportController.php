<?php

namespace App\Http\Controllers\Admin\Fertilizers;

use App\Http\Controllers\Controller;
use App\Jobs\FertilizersImportJob;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImportController extends Controller
{
    public function __invoke(Request $request)
    {
        $fertilizersFilePath = Storage::put('excel', $request->file('fertilizers'));
        FertilizersImportJob::dispatch($fertilizersFilePath);

        return redirect()->back()->with('message', 'Данные импортируются');
    }
}
