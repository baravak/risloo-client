<?php

namespace App\Policies;

use App\Room;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SchedulePolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
    public function center(User $user){
        return true;
    }
    public function create(User $user, Room $room){
        if($user->isAdmin()){
            return true;
        }
        if($user->id == $room->manager->user_id)
        {
            return true;
        }
        if($user->centers->whereIn('acceptation.position', ['manager', 'operator'])->where('id', $room->center->id)->count()){
            return true;
        }
        return false;
    }
}
