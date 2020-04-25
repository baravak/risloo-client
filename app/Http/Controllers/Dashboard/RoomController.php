<?php

namespace App\Http\Controllers\Dashboard;

use App\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function index(Request $request)
    {
        $this->data->rooms = Room::apiIndex($request->all());
        return $this->view($request, 'dashboard.rooms.index');
    }

    public function create(Request $request)
    {
        return $this->view($request, 'dashboard.rooms.create');
    }
    public function store(Request $request)
    {
        return Room::apiStore($request->all());
    }

    public function show(Request $request, $relationship)
    {
        return Room::apiShow($relationship);
    }
}
