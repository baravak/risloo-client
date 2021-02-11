<?php

namespace App\Http\Controllers\Dashboard;

use App\Center;
use App\CenterUser;
use App\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use App\Room;
class CenterController extends Controller
{
    public function index(Request $request)
    {
        $this->data->centers = Center::apiIndex($request->all());
        return $this->view($request, 'dashboard.centers.index');
    }

    public function show(Request $request, $center)
    {
        $rooms = $this->data->rooms = Room::apiIndex($request->merge(['center' => $center])->all());
        $center = $this->data->center = $rooms->getFilter('center');
        return $this->view($request, 'dashboard.centers.show');
    }

    public function request(Request $request, $center)
    {
        $this->data->center = Center::request($center);
        return $this->view($request, 'dashboard.centers.listRaw');
    }

    public function create(Request $request)
    {
        $this->authorize('dashboard.centers.create');
        return $this->view( $request, 'dashboard.centers.create');
    }

    public function store(Request $request){
        $this->authorize('dashboard.centers.create');
        $center =  Center::apiStore($request->all());
        return $center->response()->json([
            'redirect' => route('dashboard.centers.show', $center->id)
        ]);
    }

    public function edit(Request $request, $center)
    {
        $center = $this->data->center = Center::apiShow($center, array_merge($request->all(), ['summary' => '']));
        $this->authorize('dashboard.centers.update', [$center, $center]);
        return $this->view($request, 'dashboard.centers.create');
    }

    public function update(Request $request, $center)
    {
        return Center::apiUpdate($center, $request->all())->response()->json();
    }
}
