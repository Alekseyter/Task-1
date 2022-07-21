<?php

namespace App\Http\Controllers\Admin\Fertilizers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Fertilizers\StoreRequest;
use App\Models\Culture;
use App\Models\Fertilizer;

class DeleteController extends Controller
{
    public function __invoke(Fertilizer $fertilizer)
    {
        $fertilizer->delete();

        return redirect()->back();
    }
}
