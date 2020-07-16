<?php

namespace App\Http\Controllers\Dashboard;

use App\Reserve;
use App\ReserveCalendar;
use App\ReserveTable;
use App\Room;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use jDate;
class ReserveController extends Controller
{
    public function __construct(Request $request)
    {
        parent::__construct($request);
        $this->data->module->singular = 'reserve';
    }
    public function index(Request $request)
    {
        // $this->data->rooms = Room::apiIndex($request->all());
        return $this->view($request, 'dashboard.reserves.index');
    }

    public function viewMode($request){
        $date = jdate();
        $current = new jDate($date->getYear(), $date->getMonth(), $date->getDay());
        $start = $current->subDays($current->getDayOfWeek());
        $end = $start->addDays(6)->addHours(23)->addMinutes(59)->addSeconds(59);
        $this->data->week = [$start, $end];
        if($request->room_id)
        {
            $room = $this->data->room = $request->room_id ? Room::apiShow($request->room_id) : null;
            Gate::authorize('dashboard.rooms.admin', [$room]);
            $request->request->add(['mode' => 'week']);
            $reserves = $this->data->reserves = Reserve::apiIndex($request->all());
            $this->data->table = [];
            for ($i = 7; $i <= 22; $i++) {
                $this->data->table[] = $i;
            }
            if ($reserves->count()) {
                $table = new ReserveCalendar($reserves);
                $this->data->hours = $table->hours;
                $this->data->calendar = $table->calendar;
            }
        }
    }

    public function create(Request $request)
    {
        $this->data->global->title = __('Create new reserve');
        // dd((new User())->execute('me'));
        // dd(auth()->user());
        $this->viewMode($request);
        return $this->view($request, 'dashboard.reserves.create');
    }
    public function store(Request $request)
    {
        Reserve::apiStore($request->all());
        $request->request->add(['time' => $request->started_at]);
        return $this->calendar($request);
    }
    public function calendar(Request $request){
        $this->viewMode($request);
        return $this->view($request, 'dashboard.reserves.calendar');
    }

    public function show(Request $request, $relationship)
    {
        return Room::apiShow($relationship);
    }
}
