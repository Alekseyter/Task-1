<?php

namespace App\Http\Controllers\Admin\Clients;

use App\Http\Controllers\Controller;
use App\Jobs\ClientsImportJob;
use App\Models\ImportStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ImportController extends Controller
{
    public function __invoke(Request $request)
    {
        $data = [
            'status' => 1,
            'user_id' => Auth::id(),
        ];
        $importStatus = ImportStatus::create($data);

        $clientsFilePath = Storage::put('excel', $request->file('clients'));
        ClientsImportJob::dispatch($clientsFilePath, $importStatus);

        return redirect()->route('admin.import-status.index');
    }
}
