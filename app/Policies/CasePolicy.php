<?php

namespace App\Policies;

use App\Room;
use App\User;
use App\TherapyCase;
use Illuminate\Auth\Access\HandlesAuthorization;

class CasePolicy
{
    use HandlesAuthorization;
    public function viewAny(User $user, Room $room){
        if($user->isAdmin()){
            return true;
        }
        if($room->acceptation && $room->acceptation->position == 'manager'){
            return true;
        }
        if($room->center->acceptation && in_array($room->center->acceptation->position, ['operator', 'manager'])){
            return true;
        }
        return false;
    }

    public function create(User $user, Room $room = null)
    {
        if($user->isAdmin()){
            return true;
        }

        if(!$room && $user->centers && $user->centers->whereIn('acceptation.position', ['operator', 'manager'])->count()){
            return true;
        }elseif(!$room){
            return false;
        }
        if($room->acceptation && in_array($room->acceptation->position, ['operator', 'manager'])) return true;
        if($room->center->acceptation && in_array($room->center->acceptation->position, ['operator', 'manager'])) return true;

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
    public function isClient(User $user, TherapyCase $case){
        return $case->clients->where('user.id', $user->id)->count() > 0;
    }
}
