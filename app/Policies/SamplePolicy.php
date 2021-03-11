<?php

namespace App\Policies;

use App\Room;
use App\User;
use App\Sample;
use Illuminate\Auth\Access\HandlesAuthorization;
use phpDocumentor\Reflection\Types\Boolean;

class SamplePolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        return true;
    }

    public function view(User $user, Sample $sample)
    {
        return true;
    }

    public function create(User $user)
    {
        $currentCenter = $user->centers? $user->centers->whereIn('acceptation.position', ['operator', 'manager', 'psychologist'])->count() : false;
        return (Boolean) $currentCenter ?: $user->isAdmin();
    }

    public function management(User $user, Sample $sample, Room $room = null){
        if($user->isAdmin())
        {
            return true;
        }
        $room = $sample->room ?: $room;
        if($room->acceptation && $room->acceptation->id == $room->manager->id)
        {
            return true;
        }
        $currentCenter = $user->centers->where('id', $room->center->id)->whereIn('acceptation.position', ['operator', 'manager', 'psychologist'])->first();
        if($currentCenter)
        {
            return true;
        }
        return false;
    }

    public function scoring(User $user, Sample $sample){
        if(!$sample->client) return false;
        if(auth()->isAdmin()){
            if(in_array($sample->status, ['closed', 'done'])){
                return true;
            }
            return false;
        }
        if($sample->status == 'closed' || ($sample->score_current_version && $sample->score_last_version != $sample->score_current_version)){
            return true;
        }
        return false;
    }
}
