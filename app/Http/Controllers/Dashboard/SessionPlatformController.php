<?php

namespace App\Http\Controllers\Dashboard;

use App\Assessment;
use App\SessionPlatform;
use Illuminate\Http\Request;

class SessionPlatformController extends Controller
{
    public function center(Request $request, $id)
    {
        $this->data->platforms = $platforms = SessionPlatform::apiIndex($id, $request->all());
        $this->data->center = $platforms->parentModel;
        return $this->view($request, 'dashboard.centers.settings.index');
    }

    public function create(Request $request, $id)
    {
        $this->data->center = (object)['id' => $id];
        return $this->view($request, 'dashboard.centers.settings.create');
    }

    public function update(Request $request, $center, $id)
    {
        SessionPlatform::apiUpdate($center, $id, $request->all());
        return $this->view($request, 'dashboard.centers.settings.create');
    }

    public function store(Request $request, $id)
    {
        SessionPlatform::apiStore($id, $request->all());
        $this->data->center = (object)['id' => $id];
        return $this->view($request, 'dashboard.centers.settings.create');
    }
}
