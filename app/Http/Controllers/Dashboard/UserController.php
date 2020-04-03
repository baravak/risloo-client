<?php

namespace App\Http\Controllers\Dashboard;

use App\User;
use Illuminate\Http\Request;

class UserController extends _UserController
{
    public function edit(Request $request, User $user)
    {
        return parent::edit($request, $user);
    }
}
