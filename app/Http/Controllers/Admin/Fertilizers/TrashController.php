<?php

namespace App\Http\Controllers\Admin\Fertilizers;

use App\Http\Controllers\Controller;
use App\Models\Fertilizer;

class TrashController extends Controller
{
    public function __invoke()
    {
        $fertilizers = Fertilizer::onlyTrashed()->get();

        return view('admin.fertilizers.trash', compact('fertilizers'));
    }
}
