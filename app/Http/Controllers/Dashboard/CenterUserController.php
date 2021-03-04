<?php

namespace App\Http\Controllers\Dashboard;

use App\Center;
use App\CenterUser;
use Illuminate\Http\Request;

class CenterUserController extends Controller
{
    public function index(Request $request, $center)
    {
        $users = $this->data->users = CenterUser::apiIndex($center, $request->all());
        $this->data->module->result = 'users';
        $center = $this->data->center = $users->parentModel;
        return $this->view($request, 'dashboard.center-users.index');
    }

    public function create(Request $request, $center)
    {
        $center = $this->data->center = Center::apiShow($center);
        $this->authorize('dashboard.center.users.create', [$center]);
        return $this->view( $request, 'dashboard.center-users.create');
    }

    public function store(Request $request, $center){
        $response = CenterUser::apiStore($center, $request->all());
        return $response->response()->json([
            'redirect' => route('auth.theory', [
                'key' => $response->response('key'),
                'form' => $response->response('theory'),
                'create_case' => $request->create_case ? 1 : 0,
                'previousUrl' => route('dashboard.center.users.index', $center)
                ]),
            'direct' => true
        ]);
    }

    public function show(Request $request, $center, $user){
        $user = $this->data->user = CenterUser::apidashboard($center, $user, $request->all());
        return $this->view( $request, 'dashboard.center-users.show');
    }

    public function update(Request $request, $center, $user)
    {
        $response = CenterUser::apiUpdate($center, $user, $request->all());
        if ($request->headers->get('data-xhr-base') == 'row') {
            return $this->view($request, 'dashboard.center-users.listRaw', ['user' => $response, 'center' => $response->parentModel]);
        }
        return $response->response()->json();
    }
}
