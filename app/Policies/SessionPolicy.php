<?php

namespace App\Policies;

use App\Room;
use App\User;
use App\Session;
use Illuminate\Auth\Access\HandlesAuthorization;

class SessionPolicy
{
    use HandlesAuthorization;

    public function update(User $user, Session $session, $mode = null){
        if($mode == 'report'){
            if($session->case->room->manager->id != $user->id){
                return false;
            }
        }
        if($user->isAdmin()){
            return true;
        }
        if($session->case->room->manager->id == $user->id){
            return true;
        }
        if($user->centers->where('id', $session->case->room->center->id)->whereIn('acceptation.position', ['operator', 'manager'])->count()){
            return true;
        }
    }

    public function create(User $user)
    {
        if($user->isAdmin()){
            return true;
        }
        if($user->centers->whereIn('acceptation.position', ['operator', 'manager', 'psychologsit'])->count()){
            return true;
        }
    }
}
