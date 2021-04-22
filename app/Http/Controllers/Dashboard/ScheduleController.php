<?php

namespace App\Http\Controllers\Dashboard;

use App\Room;
use App\Schedule;
use App\TherapyCase;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function create(Request $request,Room $room){
        $this->authorize('create', [Schedule::class, $room]);
        $this->data->room = $room;
        $this->data->center = $room->center;
        return $this->view($request, 'dashboard.schedules.create');
    }

    public function show(Request $request, Schedule $schedule){
        $this->data->session = $schedule;
        if($schedule->parentModel instanceof Room){
            $room = $this->data->room = $schedule->parentModel;
        }else{
            $case = $this->data->case = $schedule->parentModel;
            $room = $this->data->room = $case->room;
        }
        $center = $this->data->center = $room->center;
        return $this->view($request, 'dashboard.schedules.show');
    }

    public function booking(Request $request, $session){
        return Schedule::booking($session, $request->all())->response()->json([
            'redirect' => route('dashboard.sessions.show', $session)
        ]);
    }

    public function caseCreate(Request $request,TherapyCase $case){
        $this->data->case = $case;
        $room = $this->data->room = $case->room;
        $this->data->center = $room->center;
        $this->authorize('create', [Schedule::class, $room]);
        return $this->view($request, 'dashboard.schedules.create');
    }

    public function store(Request $request, $room){
        return Schedule::apiStore($room, $request->all())->response()->json();
    }
    public function center(Request $request, $center){
        $time = (int) $request->time;
        $time = Carbon::createFromTimestamp($request->time ?: time())->timestamp;
        $this->authorize('center', Schedule::class);
        $this->data->weeks = $weeks= (object) [
            'sat' => Carbon::createFromTimestamp($time)->startOfWeek(),
            'sun' => Carbon::createFromTimestamp($time)->startOfWeek()->addDays(1),
            'mon' => Carbon::createFromTimestamp($time)->startOfWeek()->addDays(2),
            'tue' => Carbon::createFromTimestamp($time)->startOfWeek()->addDays(3),
            'wed' => Carbon::createFromTimestamp($time)->startOfWeek()->addDays(4),
            'thu' => Carbon::createFromTimestamp($time)->startOfWeek()->addDays(5),
            'fri' => Carbon::createFromTimestamp($time)->startOfWeek()->addDays(6),
        ];
        $schedules = $this->data->schedules =  Schedule::center($center, $time);
        $this->data->center = $schedules->parentModel;
        return $this->view($request, 'dashboard.schedules.center');
    }
}
