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
        return true;
    }

    public function view(User $user, Assessment $assessment)
    {
        return false;
        if (!in_array($user->type, ['admin', 'manager', 'operator', 'psychologist', 'counseling_center'])) {
            return false;
        }
        return true;
    }

    public function create(User $user)
    {
        return false;
        if (!in_array($user->type, ['admin', 'manager', 'operator', 'psychologist', 'counseling_center'])) {
            return false;
        }
        return true;
    }
}
