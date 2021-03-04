<?php

namespace App\Http\Controllers\Dashboard;

use App\User;
use Illuminate\Http\Request;

class HomeController extends _HomeController
{
    public function index(Request $request)
    {
        $this->data->user = $user = User::apiDashboard(auth()->id());
        return $this->view($request, 'dashboard.home.index');
    }
}
