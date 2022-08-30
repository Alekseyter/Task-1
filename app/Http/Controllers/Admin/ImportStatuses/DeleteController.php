<?php

namespace App\Http\Controllers\Admin\ImportStatuses;

use App\Http\Controllers\Controller;
use App\Models\ImportStatus;

class DeleteController extends Controller
{
    public function __invoke(ImportStatus $importStatus)
    {
        $importStatus->delete();

        return redirect()->back();
    }

    public function deleteAll()
    {
        ImportStatus::truncate();

        return redirect()->back();
    }
}
