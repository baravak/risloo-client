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
        switch($request->header('data-xhr-base')){
            case 'select2' :
                $this->data->global = $users->map(function($user){
                    return ['id' => $user->id, 'title' => $user->name ?: $user->id];
                });
                return $this->view($request, 'dashboard.center-users.select2');
            case 'quick_search' : $view = 'dashboard.center-users.quick_search'; break;
            default : $view = 'dashboard.center-users.index';
        }
        $this->data->module->result = 'users';
        $center = $this->data->center = $users->parentModel;
        return $this->view($request, $view);
    }

    public function create(Request $request, Center $center)
    {
        $this->data->center = $center;
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
        $center = $this->data->center = $user->parentModel;
        return $this->view( $request, 'dashboard.center-users.show');
    }

    public function update(Request $request, $center, $user)
    {
        $this->data->user = $user = CenterUser::apiUpdate($center, $user, $request->all());
        $this->data->center = $center = $user->parentModel;
        if ($request->headers->get('data-xhr-base') == 'row') {
            return $this->view($request, 'dashboard.center-users.listRaw', ['user' => $user, 'center' => $user->parentModel]);
        }
        return response()->json([
            'redirect' => route('dashboard.center.users.edit', ['center' => $center->id, 'user' => $user->id])
        ]);
    }

    public function edit(Request $request, $center, $user){
        $this->data->user = $user = CenterUser::apiShow($center, $user);
        $this->data->center = $center = $user->parentModel;
        $this->authorize('update', $user);
        return $this->view($request, 'dashboard.center-users.edit');
    }
}
