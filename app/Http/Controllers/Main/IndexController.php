<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Fertilizer;
use Illuminate\Support\Facades\Artisan;

class IndexController extends Controller
{
    public function __invoke()
    {
        $fertilizers = Fertilizer::paginate(6);

        $fertilizers_all = Fertilizer::all();
        $fertilizers_culture = Fertilizer::all()->unique('culture_id');
        $fertilizers_district = Fertilizer::all()->unique('district');

        return view('main.index', compact('fertilizers', 'fertilizers_all', 'fertilizers_culture', 'fertilizers_district'));
    }
}
