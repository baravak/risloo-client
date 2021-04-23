<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PublicTransaction
{
    use HandlesAuthorization;

    public function creditor(User $user, $transaction, $center){
        if($transaction->type != 'creditor') return;
        $center = $user->centers->where('id', $center->id)->first();
        if(!$center->treasuries) return;
        return $center->treasuries->where('id', $transaction->creditor->id)->first();
    }
}
