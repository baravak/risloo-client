<?php

namespace App\Http\Controllers\Dashboard;

use App\Room;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function create(Request $request,Room $room){
        $this->data->room = $room;
        return $this->view($request, 'dashboard.schedules.create');
    }
}
