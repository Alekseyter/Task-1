<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Http\Filters\FertilizerFilter;
use App\Http\Requests\Fertilizers\FilterRequest;
use App\Models\Fertilizer;

class FilterController extends Controller
{
    public function __invoke(FilterRequest $request)
    {
        $data = $request->validated();
        $filter = app()->make(FertilizerFilter::class, ['queryParams' => array_filter($data)]);
        $fertilizers = Fertilizer::filter($filter)->paginate(6)->withQueryString();

        $fertilizers_all = Fertilizer::all();
        $fertilizers_culture = Fertilizer::all()->unique('culture_id');
        $fertilizers_district = Fertilizer::all()->unique('district');

        return view('main.index', compact('fertilizers', 'fertilizers_all', 'fertilizers_culture', 'fertilizers_district'));
    }

    public function sortName()
    {
        $fertilizers = Fertilizer::orderBy('name', 'ASC')->paginate(6);
        $fertilizers_all = Fertilizer::all();
        $fertilizers_culture = Fertilizer::all()->unique('culture_id');
        $fertilizers_district = Fertilizer::all()->unique('district');

        return view('main.index', compact('fertilizers', 'fertilizers_all', 'fertilizers_culture', 'fertilizers_district'));
    }

    public function sortPriceDown()
    {
        $fertilizers = Fertilizer::orderBy('price', 'ASC')->paginate(6);
        $fertilizers_all = Fertilizer::all();
        $fertilizers_culture = Fertilizer::all()->unique('culture_id');
        $fertilizers_district = Fertilizer::all()->unique('district');

        return view('main.index', compact('fertilizers', 'fertilizers_all', 'fertilizers_culture', 'fertilizers_district'));
    }

    public function sortPriceUp()
    {
        $fertilizers = Fertilizer::orderBy('price', 'DESC')->paginate(6);
        $fertilizers_all = Fertilizer::all();
        $fertilizers_culture = Fertilizer::all()->unique('culture_id');
        $fertilizers_district = Fertilizer::all()->unique('district');

        return view('main.index', compact('fertilizers', 'fertilizers_all', 'fertilizers_culture', 'fertilizers_district'));
    }
}
