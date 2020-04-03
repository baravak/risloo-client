<?php

namespace App\Policies;

use App\RelationshipUser;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class RelationshipUserPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        return true;
    }

    public function update(User $user, RelationshipUser $relationship)
    {
        return $relationship->can('update');
    }
    public function create(User $user)
    {
        return true;
    }

    public function changePosition(User $user, RelationshipUser $relationship)
    {
        if($relationship->can('changePosition'))
        {
            return $relationship->can('changePosition');
        }
        return $relationship->can('changePosition');
    }
    public function changeStatus(User $user, RelationshipUser $relationship)
    {
        return $relationship->can('changeStatus');
    }
    public function updateCreator(User $user, RelationshipUser $relationship)
    {
        return $relationship->can('updateCreator');
    }
}
