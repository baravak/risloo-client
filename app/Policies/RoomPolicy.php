<?php

namespace App\Policies;


use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class RoomPolicy
{
    use HandlesAuthorization;
    public function admin(User $user, $room){
        if($room->can('add')){
            return true;
        }
    }

    public function create(User $user){
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
            if($value->acception && $value->acception->position == 'manager')
            {
                return true;
            }
        }
        return false;
    }
}
