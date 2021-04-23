<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Treasury extends API
{
    public $with = [
        'user' => User::class
    ];
}
