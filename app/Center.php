<?php
namespace App;

class Center extends Relationship
{
    public $with = [
        'manager' => User::class,
        'creator' => User::class,
        'acceptation' => RoomUser::class,
        'detail' => CenterDetail::class,
        'treasuries' => 	Treasury::class
    ];
    public static function request($center)
    {
        return (new static)->execute("centers/$center/request", [], 'POST');
    }
}
