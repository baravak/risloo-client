<?php

namespace App\Policies;

use App\User;
use App\Assessment;
use Illuminate\Auth\Access\HandlesAuthorization;

class AssessmentPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        if (!in_array($user->type, ['admin', 'manager', 'operator', 'psychologist'])) {
            return false;
        }
        return true;
    }

    public function view(User $user, Assessment $assessment)
    {
        if (!in_array($user->type, ['admin', 'manager', 'operator', 'psychologist'])) {
            return false;
        }
        return true;
    }

    public function create(User $user)
    {
        if (!in_array($user->type, ['admin', 'manager', 'operator', 'psychologist'])) {
            return false;
        }
        return true;
    }
}
