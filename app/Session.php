<?php
namespace App;


class Session extends API
{
    public $with = [
        'client' => User::class,
        'case' => TherapyCase::class,
    ];
    protected $casts = [
        'started_at' => 'datetime',
        'finished_at' => 'datetime',
        'updated_at' => 'datetime',
        'created_at' => 'datetime',
    ];

    public static function apiStore($room, array $params)
    {
        $store = new static;
        return $store->execute(sprintf("rooms/%s/sessions", $room ?: '-'), $params, 'post');
    }
}
