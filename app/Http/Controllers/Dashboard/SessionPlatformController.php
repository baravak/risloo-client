<?php

namespace App\Http\Controllers\Dashboard;

use App\Assessment;
use App\SessionPlatform;
use App\SessionPlatformRoom;
use Illuminate\Http\Request;

class SessionPlatformController extends Controller
{
    public function center(Request $request, $id)
    {
        $this->data->platforms = $platforms = SessionPlatform::apiIndex($id, $request->all());
        $this->data->center = $platforms->parentModel;
        return $this->view($request, 'dashboard.centers.settings.index');
    }

    public function room(Request $request, $id)
    {
        $this->data->platforms = $platforms = SessionPlatformRoom::apiIndex($id, $request->all());
        $this->data->room = $room = $platforms->parentModel;
        $this->data->center = $room->center;
        return $this->view($request, 'dashboard.rooms.settings.index');
    }

    public function roomUpdate(Request $request, $center, $id)
    {
        $this->data->platform = $platform = SessionPlatformRoom::apiUpdate($center, $id, $request->all());
        // $this->data->center = $platform->parentModel;
        // if($request->header('Data-xhr-base') == 'inline'){
        //     return $platform;
        // }
        // return [
        //     'redirect' => route('dashboard.center.setting.session-platforms.edit', [$center, $id]),
        //     'replace' => true
        // ];
    }

    public function create(Request $request, $id)
    {
        $this->data->center = (object)['id' => $id];
        return $this->view($request, 'dashboard.centers.settings.create');
    }

    public function update(Request $request, $center, $id)
    {
        $this->data->platform = $platform = SessionPlatform::apiUpdate($center, $id, $request->all());
        $this->data->center = $platform->parentModel;
        if($request->header('Data-xhr-base') == 'inline'){
            return $platform;
        }
        return [
            'redirect' => route('dashboard.center.setting.session-platforms.edit', [$center, $id]),
            'replace' => true
        ];
    }

    public function edit(Request $request, $center, $id){
        $this->data->platform = $platform = $id instanceof SessionPlatform ? $id : SessionPlatform::apiShow($center, $id, $request->all());
        $this->data->center = $platform->parentModel;
        return $this->view($request, 'dashboard.centers.settings.create');
    }

    public function store(Request $request, $id)
    {
        SessionPlatform::apiStore($id, $request->all());
        $this->data->center = (object)['id' => $id];
        return $this->view($request, 'dashboard.centers.settings.create');
    }
}
