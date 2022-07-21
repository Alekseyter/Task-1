<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Fertilizer;

class ShowController extends Controller
{
    public function __invoke(Fertilizer $fertilizer)
    {
        return view('main.fertilizers.show', compact('fertilizer'));
    }
}
