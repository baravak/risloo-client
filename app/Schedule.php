<?php
namespace App;

use App\Models\ApiCollection;
use App\Models\ApiPaginator;

class Schedule extends API
{
    public $parent = Center::class;
    protected $casts = [
        'started_at' => 'datetime',
        'finished_at' => 'datetime',
        'opens_at' => 'datetime',
        'closed_at' => 'datetime',
        'canceled_at' => 'datetime',
        'group_session' => 'boolean'
    ];
    public $with = [
        'client' => User::class,
        'case' => TherapyCase::class,
        'room' => Room::class,
    ];
    public static function apiStore($room, array $params = [])
    {
        return (new static)->execute("rooms/$room/schedules", $params, 'POST');
    }

    public static function center(String $center, int $timestamp = null) : ApiCollection
    {
        return (new static)->execute("centers/$center/schedules", ['time' => $timestamp], 'GET');
    }
}
