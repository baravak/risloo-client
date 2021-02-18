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
        $this->data->cases = TherapyCase::apiIndex($request->all());
        return $this->view($request, 'dashboard.cases.index');
    }

    public function create(Request $request)
    {
        if($request->client){
            $this->data->client = $client = RoomUser::apiShow($request->room, $request->client);
            $this->data->room = $client->parentModel;
        }else{
            $this->data->room = $request->room ? Room::apiShow($request->room) : null;
        }
        $this->authorize('dashboard.cases.create');
        return $this->view($request, 'dashboard.cases.create');
    }
    public function store(Request $request)
    {
        $this->authorize('dashboard.cases.create');
        $case = TherapyCase::apiStore($request->room_id, $request->except('room_id'));
        return $case->response()->json([
            'redirect' => route('dashboard.cases.show', $case->id)
        ]);
    }

    public function show(Request $request, $case)
    {
        $case = $this->data->case = TherapyCase::apiShow($case, $request->merge(['usage' => 'case_dashboard'])->all());
        return $this->view($request, 'dashboard.cases.show');
    }

    public function sessionUpdate(Request $request, $case, $session){
        $session = $this->data->session = Session::apiUpdate($session, $request->all());
        $this->data->case = $session->case;
        return $this->view($request, 'dashboard.cases.show.session-list');
    }
}
