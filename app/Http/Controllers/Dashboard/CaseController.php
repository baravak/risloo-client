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
        $case = $this->data->case = TherapyCase::apiShow($case, $request->merge(['usage' => 'case_dashboard'])->all());
        $room = $this->data->room = $case->room;
        $center = $this->data->center = $room->center;
        return $this->view($request, 'dashboard.cases.show');
    }

    public function sessionUpdate(Request $request, $case, $session){
        $session = $this->data->session = Session::apiUpdate($session, $request->all());
        $this->data->case = $session->case;
        return $this->view($request, 'dashboard.cases.show.session-list');
    }
}
