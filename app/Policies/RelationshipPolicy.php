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
        return $user->type == 'admin';
        return Relationship::apiAllows('create');
    }

    public function update(User $user, $relationship)
    {
        return $relationship->can('update');
    }

    public function acception(User $user, $relationship)
    {
        return $relationship->can('acception');
    }

    public function details(User $user, $relationship)
    {
        return $relationship->can('details');
    }
}
