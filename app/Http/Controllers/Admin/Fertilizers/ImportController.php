<?php

namespace App\Http\Controllers\Admin\Fertilizers;

use App\Http\Controllers\Controller;
use App\Jobs\FertilizersImportJob;
use App\Models\ImportStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ImportController extends Controller
{
    public function __invoke(Request $request)
    {
        $data = [
            'user_id' => Auth::id(),
        ];
        $importStatus = ImportStatus::create($data);

        $fertilizersFilePath = Storage::put('excel', $request->file('fertilizers'));
        FertilizersImportJob::dispatch($fertilizersFilePath, $importStatus);

        return redirect()->route('admin.import-status.index');
    }
}
