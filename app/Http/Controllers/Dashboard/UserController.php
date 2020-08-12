<?php

namespace App\Http\Controllers\Dashboard;

use App\Center;
use App\RelationshipUser;
use App\Room;
use App\User;
use Illuminate\Http\Request;

class UserController extends _UserController
{
    public function showPsychologist(Request $request, User $user)
    {

        $this->data->rooms = Room::apiIndex($request->all());
    }
    public function showCounselingCenter(Request $request, User $user)
    {
        // dd(auth()->user()->centers);
        // dd(auth()->user()->centers->where('type', 'counseling_center')->load('owner'));
        // $this->data->members = RelationshipUser::apiIndex($user->center->id);
    }

    public function request(Request $request)
    {
        $this->data->center = Center::request($request->center_id);
        return $this->view($request, 'dashboard.users.profiles.centerAcceptation');
    }

    public function accept(Request $request)
    {
        $this->data->center = Center::accept($request->Ccenter_id);
        return $this->view($request, 'dashboard.users.profiles.centerAcceptation');
    }

    public function index(Request $request){
        return parent::index($request);
    }

}
