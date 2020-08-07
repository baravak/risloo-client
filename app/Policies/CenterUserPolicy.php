<?php

namespace App\Policies;

use App\Center;
use App\CenterUser;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CenterUserPolicy
{
    use HandlesAuthorization;

    public function update(User $user, CenterUser $centerUser, $option = null){
        $center = $centerUser->parentModel;
        $acception = $center->acception;
        if($user->id == $centerUser->user->id && !$user->isAdmin())
        {
            return false;
        }
        if ($center->manager->id == $centerUser->user->id) {
            return false;
        }

        if(!$user->isAdmin() && (!$acception || !in_array($acception->position, ['manager', 'operator'])))
        {
            return false;
        }
        if ($center->type == 'personal_clinic' && $option == 'position')
        {
            return false;
        }

        if ($center->manager->id == $user->id || $user->isAdmin()) {
            return true;
        }

        if($centerUser->position == 'manager')
        {
            return false;
        }
        if ($centerUser->position != 'client' && $acception->position != 'manager') {
            return false;
        }
        if($option == 'position' && $acception->position != 'manager')
        {
            return false;
        }

        return true;
    }

    public function create(User $user, Center $center){
        if($user->isAdmin())
        {
            return true;
        }
        if(!$center->acception)
        {
            return false;
        }
        if(in_array($center->acception->position, ['manager', 'operator']))
        {
            return true;
        }
        return false;
    }
}
