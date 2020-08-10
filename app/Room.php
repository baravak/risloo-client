<?php
namespace App;

class Room extends API
{
    public $with = [
        'owner' => User::class,
        'manager' => User::class,
        'creator' => User::class,
        'center' => Center::class,
        'acception' => RoomUser::class,
    ];

    public $filterWith = [
        'center' => Center::class,
    ];

    public static function apiStore($center, array $params)
    {
        $store = new static;
        return $store->execute(sprintf("centers/%s/rooms", $center ?: '-'), $params, 'post');
    }
}
