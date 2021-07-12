<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends API
{
    public $with = [
        'user' => User::class,
        'center' => Center::class
    ];
}
