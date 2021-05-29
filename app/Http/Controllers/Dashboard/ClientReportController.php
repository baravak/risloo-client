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

    public function show(Request $request, $id){
        $this->data->report = $report = ClientReport::apiShow($id, $request->all());
        $this->data->room = $room = $report->room;
        $this->data->center = $center = $room->center;
        $this->data->case = $case = $report->case;
        if($report->session){
            $this->data->session = $session = $report->session;
        }
        return $this->view($request, 'dashboard.client-reports.show');
    }

    public function edit(Request $request, $id){
        $this->data->report = $report = ClientReport::apiShow($id, $request->all());
        $this->data->room = $room = $report->room;
        $this->data->center = $center = $room->center;
        $this->data->case = $case = $report->case;
        if($report->session){
            $this->data->session = $session = $report->session;
            $this->data->case = $case = $session->case;
        }
        return $this->view($request, 'dashboard.client-reports.create');
    }
    public function update(Request $request, $id){
        return ClientReport::apiUpdate($id, $request->all())->response()->json([
            'redirect' => route('dashboard.client-reports.show', $id)
        ]);
    }




    public function create(Request $request, $serial){
        if(substr($serial, 0, 2) == 'CS'){
            $this->data->case = $case = TherapyCase::apiShow($serial);
            $this->data->result = ['case', $case->id];
            $this->data->room = $room = $case->room;
            $this->data->center = $center = $room->center;
        }elseif(substr($serial, 0, 2) == 'SE'){
            $this->data->session = $session = Session::apiShow($serial);
            $this->data->case = $session->case;
            $this->data->room = $room = $session->room;
            $this->data->center = $center = $room->center;
            $this->data->result = ['session', $session->id];
        }
        return $this->view($request, 'dashboard.client-reports.create');
    }

    public function store(Request $request, $serial){
        $report= ClientReport::apiChildStore($serial, $request->all());
        return $report->response()->json([
            'redirect' => route('dashboard.client-reports.show', $report->id)
        ]);
    }
}
