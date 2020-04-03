<?php

namespace App\Policies;

use App\Relationship;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class RelationshipPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        return true;
    }
    public function create(User $user)
    {
        if (!in_array($user->type, ['admin', 'operator', 'psychologist'])) {
            return false;
        }
        return true;
    }

    public function update(User $user, Relationship $relationship)
    {
        return $relationship->can('edit');
    }
}
