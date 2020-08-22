<?php
namespace App;

class scoreResult extends API
{
    public $endpointPath = '$/samples';
    public $with = [
        'user' => User::class,
        'client' => User::class,
        'room' => Room::class,
        'case' => TherapyCase::class,
        'profiles' => File::class
    ];

    public static function result($serial)
    {
        return (new static)->execute("%s/$serial/scoring", [], 'get');
    }
}
