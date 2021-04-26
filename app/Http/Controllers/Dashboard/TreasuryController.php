<?php

namespace App\Http\Controllers\Dashboard;

use App\Treasury;
use App\TreasuryDashboard;
use Illuminate\Http\Request;

class TreasuryController extends Controller
{
    public function index(Request $request){
        $this->data->treasuries = Treasury::apiIndex($request->all());
        return $this->view($request, 'dashboard.treasuries.index');
    }

    public function create(Request $request){
        return $this->view($request, 'dashboard.treasuries.create');
    }

    public function edit(Request $request, Treasury $treasury){
        $this->data->treasury = $treasury;
        return $this->view($request, 'dashboard.treasuries.create');
    }

    public function store(Request $request){
        return Treasury::apiStore($request->all())->response()->json([
            'redirect' => route('dashboard.treasuries.index')
        ]);
    }

    public function show(Request $request, $treasury){
        $this->data->transactions = $transactions = TreasuryDashboard::apiDashboard($treasury, $request->all());
        $this->data->treasury  = $treasury= $transactions->parentModel;
        return $this->view($request, 'dashboard.transactions.index');
    }

    public function update(Request $request, $treasury){
        return Treasury::apiUpdate($treasury, $request->all())->response()->json([
            'redirect' => route('dashboard.treasuries.index')
        ]);
    }
}
