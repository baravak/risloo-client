<?php
namespace App;

class Relationship extends API
{
    public $with = [
        'owner' => User::class,
        'manager' => User::class,
        'creator' => User::class,
    ];
}
