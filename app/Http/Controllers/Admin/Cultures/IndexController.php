<?php

namespace App\Http\Controllers\Admin\Cultures;

use App\Http\Controllers\Controller;
use App\Models\Culture;

class IndexController extends Controller
{
    public function __invoke()
    {
        $cultures = Culture::paginate(6);
        return view('admin.cultures.index', compact('cultures'));
    }
}
