<?php

namespace App\Http\Controllers\Dashboard;

use App\Center;
use App\CenterUser;
use App\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function index(Request $request)
    {
        $rooms = $this->data->rooms = Room::apiIndex($request->all());
        $this->data->center = $rooms->getFilter('center');
        return $this->view($request, 'dashboard.rooms.index');
    }

    public function create(Request $request)
    {
        $this->authorize('create', Room::class);
        if($request->user && $request->center)
        {
            $user = $this->data->user = CenterUser::apiShow($request->center, $request->user);
            $this->data->center = $user->parentModel;
        }
        elseif($request->center)
        {
            $this->data->center = Center::apiShow($request->center);
        }
        return $this->view($request, 'dashboard.rooms.create');
    }
    public function store(Request $request)
    {
        $this->authorize('create', Room::class);
        $response = Room::apiStore($request->counseling_center_id, $request->all(['psychologist_id']));
        return $response->response()->json([
            'redirect' => route('dashboard.rooms.index', ['center' => $response->center->id])
            ]);
    }

    public function show(Request $request, $room)
    {
        $this->data->room = Room::apiShow($room);
        return $this->view($request, 'dashboard.rooms.show');
    }
}
