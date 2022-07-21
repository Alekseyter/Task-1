<?php

namespace App\Http\Controllers\Admin\Fertilizers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Fertilizers\StoreRequest;
use App\Models\Culture;
use App\Models\Fertilizer;

class EditController extends Controller
{
    public function __invoke(Fertilizer $fertilizer)
    {
        $cultures = Culture::all();
        return view('admin.fertilizers.edit', compact('fertilizer', 'cultures'));
    }
}
