<?php

namespace App\Http\Controllers\Dashboard;

use App\Room;
use App\Schedule;
use Carbon\Carbon;
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
    public function center(Request $request, $center){
        $this->data->weeks = $weeks= (object) [
            'sat' => Carbon::now()->startOfWeek(),
            'sun' => Carbon::now()->startOfWeek()->addDays(1),
            'mon' => Carbon::now()->startOfWeek()->addDays(2),
            'tue' => Carbon::now()->startOfWeek()->addDays(3),
            'wed' => Carbon::now()->startOfWeek()->addDays(4),
            'thu' => Carbon::now()->startOfWeek()->addDays(5),
            'fri' => Carbon::now()->startOfWeek()->addDays(6),
        ];
        $this->data->schedules =  Schedule::center($center);
        return $this->view($request, 'dashboard.schedules.center');
    }
}
