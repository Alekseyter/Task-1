<?php
namespace App\Helpers;

class AppHelper
{
    public function previousPage($routing) {
        return url()->current() === url()->previous() ? route($routing) : url()->previous();
    }
}
