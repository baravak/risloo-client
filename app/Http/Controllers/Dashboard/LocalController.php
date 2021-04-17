<?php

namespace App\Http\Controllers\Dashboard;

use App\User;
use Illuminate\Http\Request;

class LocalController extends _HomeController
{
    public function index(Request $request)
    {
        return $this->view($request, 'dashboard.payments.index');
    }

    public function billings(Request $request)
    {
        return $this->view($request, 'dashboard.billings.index');
    }

    public function billingItems(Request $request)
    {
        return $this->view($request, 'dashboard.billings.items.index');
    }

    public function transactions(Request $request)
    {
        return $this->view($request, 'dashboard.transactions.index');
    }

    public function treasuries(Request $request)
    {
        return $this->view($request, 'dashboard.treasuries.index');
    }

    public function schedules(Request $request)
    {
        return $this->view($request, 'dashboard.schedules.center-schedules');
    }

    public function schedulesShow(Request $request)
    {
        return $this->view($request, 'dashboard.schedules.show1');
    }
}
