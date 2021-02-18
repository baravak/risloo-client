<?php

namespace App\Policies;

use App\Center;
use App\CenterUser;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class RoomPolicy
{
    use HandlesAuthorization;
    public function admin(User $user, $room){
        if($user->isAdmin())
        {
            return true;
        }
        if($room->manager->id == $user->id)
        {
            return true;
        }
        if($room->center->acceptation && in_array($room->center->acceptation->position, ['manager', 'operator']))
        {
            return true;
        }
        return false;
    }

    public function create(User $user, Center $center, CenterUser $centerUser = null){
        if($centerUser){

        }else{
            if($user->isAdmin()){
                return true;
            }
            if($center->acceptation){
                if($center->acceptation->accepted_at && !$center->acceptation->kicked_at && in_array($center->acceptation->position, config('users.room_managers'))){
                    return true;
                }
            }
        }
        return false;
    }
}
