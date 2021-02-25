<?php

namespace App\Http\Controllers\Dashboard;

use App\Center;
use App\RelationshipUser;
use App\Room;
use App\User;
use App\UserDashboard;
use Illuminate\Http\Request;

class UserController extends _UserController
{
    public function me(Request $request)
    {
        return $this->show($request, auth()->id());
    }
    public function show(Request $request, $user)
    {
        $user = $this->data->user = UserDashboard::apiDashboard($user, $request->all());
        $this->data->user = $user;
        return $this->view($request, 'dashboard.users.show');
    }
    public function index(Request $request)
    {
        $this->data->users = User::apiIndex($request->all());
        return $this->view($request, $request->header('data-xhr-base') == 'quick_search'? 'dashboard.users.list-xhr' : 'dashboard.users.index');
    }

    public function publicKey(Request $request, $user){
        if(auth()->user()->public_key){
            abort(403, 'public key has been saved');
        }
        $user = User::setPublicKey($user, $request->all());
        $request->session()->put('User', $user->response()->toArray());
        return $user->response()->json(['redirect' => route('dashboard.users.edit', $user->id).'#public-key']);
    }
}
