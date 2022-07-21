<?php

namespace App\Http\Controllers\Admin\Cultures;

use App\Http\Controllers\Controller;
use App\Models\Culture;

class TrashController extends Controller
{
    public function __invoke()
    {
        $cultures = Culture::onlyTrashed()->get();

        return view('admin.cultures.trash', compact('cultures'));
    }
}
