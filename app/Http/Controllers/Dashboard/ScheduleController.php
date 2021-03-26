<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function create(Request $request){
        return $this->view($request, 'dashboard.schedules.create');
    }
}
