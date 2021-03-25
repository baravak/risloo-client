<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    public function update(User $user, User $usr){
        if($user->isAdmin()) return true;
        if($user->id == $usr->id) return true;
        return false;
    }

    public function admin(User $user){
        return $user->type == 'admin';
    }
}
