<?php

namespace App\Http\Controllers\Dashboard;

use App\Center;
use App\RelationshipUser;
use App\User;
use Illuminate\Http\Request;

class CenterController extends Controller
{
    public function index(Request $request)
    {
        $query = array_merge($request->all(), ['type' => in_array($request->type, ['clinic' , 'counseling_center']) ? $request->type : 'center']);

        $this->data->centers = Center::apiIndex($query);
        return $this->view($request, 'dashboard.centers.index');
    }

    public function show(Request $request, $center)
    {
        $this->data->users = RelationshipUser::apiIndex($center, $request->all());
        $this->data->relationship = new Center((array) $this->data->users->response('relationship'));
        return $this->view($request, 'dashboard.relationship-users.index');
    }

    public function request(Request $request)
    {
        $this->data->center = Center::request($request->center_id);
        return $this->view($request, 'dashboard.centers.listRaw');
    }

    public function accept(Request $request)
    {
        $this->data->center = Center::accept($request->Ccenter_id);
        return $this->view($request, 'dashboard.centers.listRaw');
    }
}
