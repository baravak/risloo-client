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
}
