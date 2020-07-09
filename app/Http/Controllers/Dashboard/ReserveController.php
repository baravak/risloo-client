<?php

namespace App\Http\Controllers\Dashboard;

use App\Reserve;
use App\ReserveTable;
use App\Room;
use Illuminate\Http\Request;
use jDate;
class ReserveController extends Controller
{
    public function __construct(Request $request)
    {
        parent::__construct($request);
        $this->data->module->result = 'reserve';
    }
    public function index(Request $request)
    {
        // $this->data->rooms = Room::apiIndex($request->all());
        return $this->view($request, 'dashboard.reserves.index');
    }

    public function create(Request $request)
    {
        $date = jdate();
        $current = new jDate($date->getYear(), $date->getMonth(), $date->getDay());
        $start = $current->subDays($current->getDayOfWeek());
        $end = $start->addDays(6)->addHours(23)->addMinutes(59)->addSeconds(59);
        $this->data->week = [$start, $end];
        $room = $this->data->room = $request->room_id ? Room::apiShow($request->room_id) : null;
        $reserves = $this->data->reserves = Reserve::apiIndex(['mode' => 'week', 'room_id' => $room ? $room->id : null]);
        $this->data->table = [];
        for ($i=7; $i <= 22; $i++) {
            $this->data->table[] = $i;
        }
        if($reserves){
            $table = new ReserveTable($reserves);
            $this->data->table = $table->hours;
            $this->data->group = $table->group;
        }
        return $this->view($request, 'dashboard.reserves.create');
    }
    public function store(Request $request)
    {
        return Reserve::apiStore($request->all())->response()->json();
    }

    public function show(Request $request, $relationship)
    {
        return Room::apiShow($relationship);
    }
}
