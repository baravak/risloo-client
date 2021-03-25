<?php

namespace App\Http\Controllers\Dashboard;

use App\Room;
use App\RoomUser;
use App\Session;
use App\TherapyCase;
use Illuminate\Http\Request;

class CaseController extends Controller
{
    public function index(Request $request)
    {
        $cases = $this->data->cases = TherapyCase::apiIndex($request->all());
        if($request->instance && $request->header('data-xhr-base') == 'with-client-checkbox'){
            $view = 'dashboard.cases.sampleSelect2';
                $this->data->global = $cases->map(function($case){
                    return ['id' => $case->id, 'title' => $case->id];
                });
            return $this->view($request, $view);
        }
        if($request->instance && $request->header('data-xhr-base')){
            $view = 'dashboard.cases.select2';
                $this->data->global = $cases->map(function($case){
                    return ['id' => $case->id, 'title' => $case->id];
                });
            return $this->view($request, $view);
        }
        switch($request->header('data-xhr-base')){
            case 'select2':
                $view = 'dashboard.cases.sampleSelect2';
                $this->data->global = $cases->map(function($case){
                    return ['id' => $case->id, 'title' => $case->id];
                });
                break;
            default : $view = 'dashboard.cases.index';
        }
        return $this->view($request, $view);
    }

    public function create(Request $request, $room)
    {
        if($request->client){
            $this->data->client = $client = RoomUser::apiShow($room, $request->client);
            $this->data->room = $room = $client->parentModel;
        }else{
            $this->data->room = $room = Room::apiShow($room);
        }
        $this->data->center = $center = $room->center;
        $this->authorize('dashboard.cases.create');
        return $this->view($request, 'dashboard.cases.create');
    }
    public function store(Request $request, $room)
    {
        $this->authorize('dashboard.cases.create');
        $case = TherapyCase::apiStore($room, $request->all());
        return $case->response()->json([
            'redirect' => $case->route('show')
        ]);
    }

    public function show(Request $request, $case)
    {
        $case = $this->data->case = TherapyCase::apiDashboard($case);
        $room = $this->data->room = $case->room;
        $center = $this->data->center = $room->center;
        $this->data->global->title = __('Therapy case :serial', ['serial' => $case->id]) ;
        return $this->view($request, 'dashboard.cases.show');
    }

    public function sessionUpdate(Request $request, $case, $session){
        $session = $this->data->session = Session::apiUpdate($session, $request->all());
        $this->data->case = $session->case;
        return $this->view($request, 'dashboard.cases.show.session-list');
    }
}
