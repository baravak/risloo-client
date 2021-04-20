<?php

namespace App\Policies;

use App\Room;
use App\User;
use App\Session;
use Illuminate\Auth\Access\HandlesAuthorization;

class SessionPolicy
{
    use HandlesAuthorization;

    public function update(User $user, $session, $mode = null){
        if(isset($session->case->room)){
            $room = $session->case->room;
        }elseif(isset($session->parentModel) && $session->parentModel instanceof Room){
            $room = $session->parentModel;
        }else{
            $room = isset($session->parentModel) ? $session->parentModel->room : $session->room;
        }
        if($mode == 'report'){
            if($room->acceptation && $room->acceptation->position == 'manager'){
                return true;
            }
            return false;
        }
        if($user->isAdmin()){
            return true;
        }
        if(isset($session->case)){
            if($room->manager->id == $user->id){
                return true;
            }
            if($user->centers->where('id', $room->center->id)->whereIn('acceptation.position', ['operator', 'manager'])->count()){
                return true;
            }
        }
        return true;
    }

    public function create(User $user)
    {
        if($user->isAdmin()){
            return true;
        }
        if($user->centers && $user->centers->whereIn('acceptation.position', ['operator', 'manager', 'psychologsit'])->count()){
            return true;
        }
    }
}
