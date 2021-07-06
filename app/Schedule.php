<?php
namespace App;

use App\Models\ApiCollection;
use App\Models\ApiPaginator;
use App\Models\ApiResponse;

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
        'clients' => User::class,
        'case' => TherapyCase::class,
        'room' => Room::class,
        'fields' => Field::class,
        'session_platforms' => SessionPlatform::class
    ];
    public $filterWith = [
        'room' => Room::class
    ];
    public static function apiStore($room, array $params = [])
    {
        return (new static)->execute("rooms/$room/schedules", $params, 'POST');
    }

    public static function center(String $center, int $timestamp = null, $params = []) : ApiCollection
    {
        return (new static)->execute("centers/$center/schedules", array_merge($params, ['time' => $timestamp]), 'GET');
    }
    public static function room(String $room, int $timestamp = null, $params = []) : ApiCollection
    {
        return (new static)->execute("rooms/$room/schedules", array_merge($params, ['time' => $timestamp]), 'GET');
    }

    public function parentClass($parent){
        switch($parent){
            case 'center' : return Center::class;
            case 'room' : return Room::class;
            default: return TherapyCase::class;
        }
        return $parent == 'room' ? Room::class : TherapyCase::class;
    }

    public static function booking(String $schedule, array $params) : Schedule
    {
        return (new static)->execute("schedules/$schedule/booking", $params, 'GET');
    }
}
