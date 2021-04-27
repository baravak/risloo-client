<?php

namespace App\Http\Controllers\Dashboard;

use App\Billing;
use App\BillingDashboard;
use Illuminate\Http\Request;

class BillingController extends Controller
{

    public function index(Request $request)
    {
        $this->data->billings = $billings = Billing::apiIndex($request->all());
        return $this->view($request, 'dashboard.billings.index');
    }

    public function show(Request $request, $billing){
        $this->data->items = $items = BillingDashboard::apiDashboard($billing, $request->all());
        $this->data->billing = $items->parentModel;
        return $this->view($request, 'dashboard.billings.items.index');
    }

    public function doFinal(Request $request, $billing){
        Billing::doFinal($billing, $request->all());
    }
}
