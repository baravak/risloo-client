<?php

namespace App\Policies;

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

        $currentCenter = $user->centers->count() ? $user->centers->whereIn('acceptation.position', ['operator', 'manager', 'psychologist'])->count() : false;
        return (Boolean) $currentCenter ?: $user->isAdmin();
    }

    public function management(User $user, Sample $sample){
        if($user->isAdmin())
        {
            return true;
        }
        if($sample->room->manager->id == $user->id)
        {
            return true;
        }
        $currentCenter = $user->centers->where('id', $sample->room->center->id)->whereIn('acceptation.position', ['operator', 'manager', 'psychologist'])->first();
        if($currentCenter)
        {
            return true;
        }
        return false;
    }
}
