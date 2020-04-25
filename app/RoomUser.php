<?php
namespace App;

class RoomUser extends API
{
    public $parent = Room::class;
    public $endpointPath = 'rooms/%s/users';
    public $with = [
        'user' => User::class,
        'creator' => User::class
    ];
    protected $casts = [
        'kicked_at' => 'datetime',
        'accepted_at' => 'datetime',
        'updated_at' => 'datetime',
        'created_at' => 'datetime',
    ];
}
