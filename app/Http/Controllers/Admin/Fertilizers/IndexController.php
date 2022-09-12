<?php

namespace App\Http\Controllers\Admin\Fertilizers;

use App\Http\Controllers\Controller;
use App\Models\Culture;
use App\Models\Fertilizer;

class IndexController extends Controller
{
    public function __invoke()
    {
        $fertilizers = Fertilizer::orderBy('id', 'DESC')->paginate(6);
        $cultures = Culture::all();

        return view('admin.fertilizers.index', compact('fertilizers', 'cultures'));
    }
}
