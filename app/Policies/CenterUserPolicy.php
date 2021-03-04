<?php

namespace App\Policies;

use App\Center;
use App\CenterUser;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CenterUserPolicy
{
    use HandlesAuthorization;
    public function viewAny(User $user, CenterUser $centerUser)
    {
        return $user->isAdmin() || ($centerUser->acceptation && in_array($centerUser->acceptation, ['manager', 'operator']));
    }
    public function update(User $user, CenterUser $centerUser, $option = null){
        $center = $centerUser->parentModel;
        $acceptation = $center->acceptation;
        if($user->id == $centerUser->user->id && !$user->isAdmin())
        {
            return false;
        }
        if ($center->manager->id == $centerUser->user->id) {
            return false;
        }

        if(!$user->isAdmin() && (!$acceptation || !in_array($acceptation->position, ['manager', 'operator'])))
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
        if ($centerUser->position != 'client' && $acceptation->position != 'manager') {
            return false;
        }
        if($option == 'position' && $acceptation->position != 'manager')
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
        if(!$center->acceptation)
        {
            return false;
        }
        if(in_array($center->acceptation->position, ['manager', 'operator']))
        {
            return true;
        }
        return false;
    }
    public function accept(User $user, CenterUser $cUser, Center $center){
        if($user->isAdmin() || $user->centers->whereIn('acceptation.position', ['operator', 'manager'])->where('id', $center->id)->count()){
            if($cUser->kicked_at || !$cUser->accepted_at){
                return true;
            }
        }
        return false;
    }
    public function kick(User $user, CenterUser $cUser, Center $center){
        if($user->isAdmin() || $user->centers->whereIn('acceptation.position', ['operator', 'manager'])->where('id', $center->id)->count()){
            if(!$cUser->kicked_at){
                return true;
            }
        }
        return false;
    }
}
