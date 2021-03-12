<?php

namespace App\Policies;

use App\User;
use App\Session;
use Illuminate\Auth\Access\HandlesAuthorization;

class PracticePolicy
{
    use HandlesAuthorization;

    public function update(User $user, Session $session, $mode = null){
        if($mode == 'report'){
            if($session->case->room->manager->id != $user->id){
                return false;
            }
        }
        if($user->isAdmin()){
            return true;
        }
        if($session->case->room->manager->id == $user->id){
            return true;
        }
        if($user->centers->where('id', $session->case->room->center->id)->whereIn('acceptation.position', ['operator', 'manager'])->count()){
            return true;
        }
    }

    public function create(User $user, Session $session, $case = null)
    {
        if($user->isAdmin()){
            return true;
        }
        $case = $case ?: $session->case ?: $session->parentModel;
        if($case->room->acceptation && $case->room->acceptation->position == 'manager'){
            return true;
        }
        // if($case->room->center->whereIn('acceptation.position', ['operator', 'manager'])->count()){
        //     return true;
        // }
    }
}
