<?php
namespace App;

class Relationship extends API
{
    public $with = [
        'owner' => User::class,
        'manager' => User::class,
        'creator' => User::class,
        'acceptation' => RelationshipUser::class
    ];
    protected $casts = [
        'kicked_at' => 'datetime',
        'accepted_at' => 'datetime',
        'joined_at' => 'datetime',
    ];
}
