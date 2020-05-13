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
}
