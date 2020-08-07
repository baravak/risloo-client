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
        if($user->isAdmin() || ($center->acception && in_array($center->acception->position, ['manager', 'owner', 'operator'])))
        {
            return true;
        }
    }

    public function create(User $user)
    {
        if($user->isAdmin())
        {
            return true;
        }
        return false;
    }
    public function acception(User $user, $center){
        if(!$center->acception)
        {
            return true;
        }
    }
}