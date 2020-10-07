<?php

namespace App\Policies;

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
        if(in_array($room->center->acception, ['manager', 'operator']))
        {
            return true;
        }
        return false;
    }

    public function create(User $user, CenterUser $roomUser = null){
        if($roomUser)
        {
            if(isset($roomUser->meta->room_id))
            {
                return false;
            }
            if(!in_array($roomUser->position, config('users.room_managers')))
            {
                return false;
            }
            if(!$roomUser->accepted_at || $roomUser->kicked_at)
            {
                return false;
            }
        }
        if($user->isAdmin())
        {
            return true;
        }
        if(!$user->centers || !$user->centers->count())
        {
            return false;
        }
        $allows = false;
        foreach ($user->centers as $key => $value) {
            if($value->acceptation && $value->acceptation->position == 'manager')
            {
                return true;
            }
        }
        return false;
    }
}
