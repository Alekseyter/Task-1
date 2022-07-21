<?php

namespace App\Http\Controllers\Admin\Fertilizers;

use App\Http\Controllers\Controller;
use App\Models\Fertilizer;

class ShowController extends Controller
{
    public function __invoke(Fertilizer $fertilizer)
    {
        return view('admin.fertilizers.show', compact('fertilizer'));
    }
}
