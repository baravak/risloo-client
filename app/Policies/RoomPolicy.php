<?php

namespace App\Policies;

use App\Center;
use App\CenterUser;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class RoomPolicy
{
    use HandlesAuthorization;
    public function admin(User $user, $room){
        if($user->isAdmin())
        {
            return true;
        }
        if($room->manager->id == $user->id)
        {
            return true;
        }
        if($room->center->acceptation && in_array($room->center->acceptation->position, ['manager', 'operator']))
        {
            return true;
        }
        return false;
    }

    public function create(User $user, Center $center = null, CenterUser $centerUser = null){
        if(!$center){
            return true;
            if($user->isAdmin()) return true;
        }
        if($centerUser){
            if(!$user->isAdmin() && !$user->centers) return;
            elseif(!$user->isAdmin() && !$user->centers->whereIn('acceptation.position', ['manager'])->where('id', $center->id)->count()){
                return false;
            }
            if(!in_array($centerUser->position, ['manager', 'operator', 'psychologist'])){
                return false;
            }
                if(!$centerUser->meta || !$centerUser->meta->room_id){
                    return true;
                }
                return false;
        }else{
            if($user->isAdmin()){
                return true;
            }
            if($center->acceptation){
                if($center->acceptation->accepted_at && !$center->acceptation->kicked_at && in_array($center->acceptation->position, config('users.room_managers'))){
                    return true;
                }
            }
        }
        return false;
    }
}
