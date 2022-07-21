<?php

namespace App\Http\Controllers\Admin\Cultures;

use App\Http\Controllers\Controller;
use App\Models\Culture;
use Illuminate\Http\Request;

class DeleteController extends Controller
{
    public function __invoke(Culture $culture)
    {
        $culture->delete();

        return redirect()->back();
    }
}
