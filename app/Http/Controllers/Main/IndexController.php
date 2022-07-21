<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Fertilizer;

class IndexController extends Controller
{
    public function __invoke()
    {
        $fertilizers = Fertilizer::paginate(6);

        $fertilizersAll = Fertilizer::all();

        return view('main.index', compact('fertilizers', 'fertilizersAll'));
    }
}
