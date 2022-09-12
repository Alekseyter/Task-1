<?php

namespace App\Http\Controllers\Admin\ImportStatuses;

use App\Http\Controllers\Controller;
use App\Models\ImportStatus;

class IndexController extends Controller
{
    public function __invoke()
    {
        $importStatuses = ImportStatus::orderBy('id', 'DESC')->paginate(8);
        $statuses = ImportStatus::getStatuses();

        return view('admin.import-statuses.index', compact('importStatuses', 'statuses'));
    }

}
