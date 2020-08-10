<?php

namespace App\Policies;


use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class RoomUserPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user, $room)
    {
        dd(10);
    }
}
