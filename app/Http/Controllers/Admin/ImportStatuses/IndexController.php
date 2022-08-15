<?php

namespace App\Http\Controllers\Admin\ImportStatuses;

use App\Http\Controllers\Controller;
use App\Models\ImportStatus;

class IndexController extends Controller
{
    public function __invoke()
    {
        $importStatuses = ImportStatus::all();
        return view('admin.import-statuses.index', compact('importStatuses'));
    }
}
