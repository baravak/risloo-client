<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends API
{
    public $with = [
        'user' => User::class,
        'treasury' => Treasury::class
    ];
    public $casts = [
        'expires_at' => 'datetime'
    ];
}
