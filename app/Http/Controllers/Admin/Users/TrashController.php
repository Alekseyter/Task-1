<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use App\Models\User;

class TrashController extends Controller
{
    public function __invoke()
    {
        $users = User::onlyTrashed()->get();

        return view('admin.users.trash', compact('users'));
    }
}
