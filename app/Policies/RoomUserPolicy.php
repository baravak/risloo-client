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
        if($room->acceptation && $room->acceptation->position == 'manager')
        {
            return true;
        }
        if ($room->center->acceptation && in_array($room->center->acceptation->position, ['manager', 'operator'])) {
            return true;
        }
        return false;
    }
}
