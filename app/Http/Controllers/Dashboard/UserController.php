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
        $this->data->global->title = $user->name ?: $user->id;

        return $this->view($request, 'dashboard.users.show');
    }
    public function index(Request $request)
    {
        $users = $this->data->users = User::apiIndex($request->all());
        if($request->header('data-xhr-base') == 'select2'){
            $this->data->global = $users->map(function($user){
                return ['id' => $user->id, 'title' => $user->name ?: $user->id];
            });
            return $this->view($request, 'dashboard.users.select2');
        }
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

    public function avatarStore(Request $request, $user)
    {
        $avatar = new User;
        $user = $this->data->user = $avatar->execute("%s/$user/avatar", $request->all('avatar'), 'POST');
        if($user->id == auth()->id()){
            $request->session()->put('User', $user->response()->toArray());
            return [
                'redirect' => route('dashboard.users.me.edit') . '#avatar-tab',
            ];
        }
        else{
            return [
                'redirect' => route('dashboard.users.edit', $user->id) . '#avatar-tab',
            ];
        }
    }
    public function edit(Request $request, User $user)
    {
        $this->data->global->title = __('Edit user');
        return parent::edit($request, $user);
    }
}
