<?php
namespace App;

class Room extends API
{
    public $with = [
        'owner' => User::class,
        'manager' => User::class,
        'creator' => User::class,
        'center' => Relationship::class,
    ];
}
