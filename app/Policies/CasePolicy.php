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
        if($user->centers->whereIn('acceptation.position', ['operator', 'manager'])->count()){
            return true;
        }
    }
}
