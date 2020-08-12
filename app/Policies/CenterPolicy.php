<?php

namespace App\Policies;

use App\Center;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CenterPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        return true;
    }

    public function view(User $user, Center $center)
    {
        return true;
    }

    public function update(User $user, Center $center){
        if($user->isAdmin())
        {
            return true;
        }
        if($center->acceptation && $center->acceptation->accepted_at && !$center->acceptation->kicked_at && in_array($center->acceptation->position, ['manager', 'owner', 'operator']))
        {
            return true;
        }
        return false;

    }

    public function create(User $user)
    {
        if($user->isAdmin())
        {
            return true;
        }
        return false;
    }
    public function acceptation(User $user, $center){
        if(!$center->acceptation)
        {
            return true;
        }
    }
}
