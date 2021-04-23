<?php

namespace App\Http\Controllers\Dashboard;

use App\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index(Request $request){
        $this->data->payments = Payment::apiIndex($request->all());
        return $this->view($request, 'dashboard.payments.index');
    }

    public function store(Request $request){
        $payment = Payment::apiStore($request->all());
        return response()->json([
            'redirect' => route('auth', ['authorized_key' => $payment->authorized_key]),
            'direct' => true
        ]);
    }
}
