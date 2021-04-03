<?php

namespace App\Http\Controllers\Dashboard;

use App\Room;
use App\Schedule;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function create(Request $request,Room $room){
        $this->data->room = $room;
        $this->data->center = $room->center;
        return $this->view($request, 'dashboard.schedules.create');
    }
    public function store(Request $request, $room){
        return Schedule::apiStore($room, $request->all());
    }
}
