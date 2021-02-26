<?php

namespace App\Http\Controllers\Dashboard;

use App\Room;
use App\RoomUser;
use Illuminate\Http\Request;

class RoomUserController extends Controller
{
    public function index(Request $request, $room)
    {
        $users = $this->data->users = RoomUser::apiIndex($room, $request->all());
        $room = $this->data->room = $users->parentModel;
        $center = $this->data->center = $room->center;
        return $this->view($request, 'dashboard.room-users.index');
    }
    public function create(Request $request, Room $room)
    {
        $this->data->room = $room;
        $this->data->center = $room->center;
        return $this->view($request, 'dashboard.room-users.create');
    }

    public function store(Request $request, $room)
    {
        return RoomUser::apiStore($room, $request->all())->response()->json([
            'redirect' => route('dashboard.room.users.index', $room)
        ]);
    }

    public function update(Request $request, $RoomUser)
    {
        $this->data->user = (new RoomUser)->execute('room-users/'. $RoomUser, $request->all(), 'PUT');
        $this->data->room = new Room((array) $this->data->user->response('room'));
        return $this->view($request, 'dashboard.room-users.list');
    }
}
