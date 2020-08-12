<?php
namespace App;

class TherapyCase extends API
{
    public $endpointPath = 'cases';
    public $with = [
        'owner' => User::class,
        'manager' => User::class,
        'creator' => User::class,
        'clients' => RelationshipUser::class,
        'room' => Room::class
    ];

    public static function apiStore($room, array $params)
    {
        $store = new static;
        return $store->execute(sprintf("rooms/%s/cases", $room ?: '-'), $params, 'post');
    }
}
