<?php

namespace App\Http\Controllers\Dashboard;

use App\User;
use Illuminate\Http\Request;

class LocalController extends _HomeController
{
    public function index(Request $request)
    {
        return $this->view($request, 'dashboard.bulk-samples.index');
    }

    public function index2(Request $request)
    {
        return $this->view($request, 'dashboard.bulk-samples.show');
    }
}
