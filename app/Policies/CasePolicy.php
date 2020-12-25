<?php

namespace App\Policies;

use App\User;
use App\TherapyCase;
use Illuminate\Auth\Access\HandlesAuthorization;

class CasePolicy
{
    use HandlesAuthorization;

    public function create(User $user, $room = null)
    {
        if($user->isAdmin()){
            return true;
        }

        if($user->centers && $user->centers->whereIn('acceptation.position', ['operator', 'manager'])->count()){
            return true;
        }
    }

    public function manager(User $user, TherapyCase $case){
        if($user->isAdmin()){
            return true;
        }
        if($case->room->manager->id == $user->id){
            return true;
        }
        if($case->room->center->acceptation && in_array($case->room->center->acceptation->position, ['operator', 'manager'])){
            return true;
        }

        return false;
    }
}
