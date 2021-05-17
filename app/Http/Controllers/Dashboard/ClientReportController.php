<?php

namespace App\Http\Controllers\Dashboard;

use App\ClientReport;
use App\ClientReportCase;
use App\Session;
use App\TherapyCase;
use Illuminate\Http\Request;

class ClientReportController extends Controller
{
    public function index(Request $request, $case){
        $this->data->reports = $reports = ClientReport::apiAll($case, $request->all());
        if($reports->parentModel instanceof Session){
            $this->data->session = $session = $reports->parentModel;
            $this->data->result = ['session', $session->id];
            $this->data->case = $case = $session->case;
            $this->data->room = $room = $session->room;
            $this->data->center = $center = $room->center;
        }elseif($reports->parentModel instanceof TherapyCase){
            $this->data->case = $case = $reports->parentModel;
            $this->data->result = ['case', $case->id];
            $this->data->room = $room = $case->room;
            $this->data->center = $center = $room->center;
    }
    return $this->view($request, 'dashboard.client-reports.caseIndex');
    }

    public function store(Request $request, $serial){
        return ClientReport::apiChildStore($serial, $request->all())->response()->json([
            'redirect' => route('dashboard.client-reports.index', $serial)
        ]);
    }
}
