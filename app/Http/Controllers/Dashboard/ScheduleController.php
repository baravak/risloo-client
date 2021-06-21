<?php

namespace App\Http\Controllers\Dashboard;

use App\Room;
use App\Schedule;
use App\TherapyCase;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Routing\UrlGenerator;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\URL;

class ScheduleController extends Controller
{
    public function create(Request $request,$room){
        $room = Room::apiShow($room, ['session_platforms' => true]);
        $this->authorize('create', [Schedule::class, $room]);
        $this->data->room = $room;
        $this->data->center = $room->center;
        return $this->view($request, 'dashboard.schedules.create');
    }

    public function show(Request $request, Schedule $schedule){
        if(Cache::get($request->payment_id)){
            $this->data->callbackPayment = (object) (Cache::get($request->payment_id)['data']);
        }
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
        try {
            return Schedule::booking($session, $request->all())->response()->json([
                'redirect' => route('dashboard.sessions.show', $session)
            ]);
        } catch (\App\Exceptions\APIException $th) {
            if($th->response()->message == 'POVERTY'){
                $fill = [
                    'url' => request()->create(url()->previous(), 'GET', ['payment_id' => $th->response()->payment->authorized_key])->getUri(),
                    'data' => $request->all()
                ];
                Cache::put($th->response()->payment->authorized_key, $fill, 300);
                return response()->json([
                    'is_ok' => true,
                    'message' => $th->response()->message,
                    'message_text' => $th->response()->message_text,
                    'redirect' => route('auth', ['authorized_key' => $th->response()->payment->authorized_key]),
                    'direct' => true
                    // 'window_open' => route('auth', ['authorized_key' => $th->response()->payment->authorized_key])
                ]);
            }else{
                throw $th;
            }
        }
    }

    public function caseCreate(Request $request,$case){
        $this->data->case = $case = TherapyCase::apiShow($case, ['session_platforms' => true]);
        $room = $this->data->room = $case->room;
        $this->data->center = $room->center;
        $this->authorize('create', [Schedule::class, $room]);
        return $this->view($request, 'dashboard.schedules.create');
    }

    public function store(Request $request, $room){
        return Schedule::apiStore($room, $request->all())->response()->json([
            'redirect' => route('dashboard.room.schedules.create', $room)
        ]);
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
        if($this->data->center->type == 'personal_clinic'){
            $this->data->room = $this->data->center;
        }
        return $this->view($request, 'dashboard.schedules.index');
    }

    public function room(Request $request, $room){
        $time = (int) $request->time;
        $time = Carbon::createFromTimestamp($request->time ?: time())->timestamp;
        $this->authorize('room', Schedule::class);
        $this->data->weeks = $weeks= (object) [
            'sat' => Carbon::createFromTimestamp($time)->startOfWeek(),
            'sun' => Carbon::createFromTimestamp($time)->startOfWeek()->addDays(1),
            'mon' => Carbon::createFromTimestamp($time)->startOfWeek()->addDays(2),
            'tue' => Carbon::createFromTimestamp($time)->startOfWeek()->addDays(3),
            'wed' => Carbon::createFromTimestamp($time)->startOfWeek()->addDays(4),
            'thu' => Carbon::createFromTimestamp($time)->startOfWeek()->addDays(5),
            'fri' => Carbon::createFromTimestamp($time)->startOfWeek()->addDays(6),
        ];
        $schedules = $this->data->schedules =  Schedule::room($room, $time);
        $this->data->room = $room = $schedules->parentModel;
        $this->data->center = $room->center;
        return $this->view($request, 'dashboard.schedules.index');
    }
}
