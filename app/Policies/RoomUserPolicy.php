<?php

namespace App\Policies;


use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class RoomUserPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user, $room)
    {
        if($user->isAdmin())
        {
            return true;
        }
        if(!auth()->user()->centers)
        {
            return false;
        }
        if($room->manager->id == $user->id)
        {
            return true;
        }
        $acceptation = auth()->user()->centers->where('id', $room->center->id)->first();
        if ($acceptation) {
            $acceptation = $acceptation->acceptation;
            if(!in_array($acceptation->position, config('users.room_managers')))
            {
                return false;
            }
        }
        return false;
    }
}
