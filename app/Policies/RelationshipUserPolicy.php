<?php

namespace App\Policies;

use App\Relationship;
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

    public function update(User $user, RelationshipUser $relationshipUser)
    {
        return $relationshipUser->can('update');
    }
    public function create(User $user, Relationship $relationship)
    {
        $relationship->can('add');
    }

    public function validPosition(User $user, RelationshipUser $relationshipUser)
    {
        return $relationshipUser->can('validPosition');
    }
    public function changeStatus(User $user, RelationshipUser $relationshipUser)
    {
        return $relationshipUser->can('validStatus');
    }
    public function updateCreator(User $user, RelationshipUser $relationshipUser)
    {
        return $relationshipUser->can('updateCreator');
    }
}
