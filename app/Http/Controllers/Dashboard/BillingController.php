<?php

namespace App\Http\Controllers\Dashboard;

use App\Billing;
use Illuminate\Http\Request;

class BillingController extends Controller
{
    public function doFinal(Request $request, $billing){
        Billing::doFinal($billing, $request->all());
    }
}
