<?php
namespace App;

class Schedule extends API
{
    public static function apiStore($room, array $params = [])
    {
        return (new static)->execute("rooms/$room/schedules", $params, 'POST');
    }
}
