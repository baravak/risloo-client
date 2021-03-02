<?php
namespace App;

class SampleSummary extends API
{
    public $endpointPath = '$/samples';
    public $with = [
        'user' => User::class,
        'client' => User::class,
        'room' => Room::class,
    ];

    public $filterWith = [
        'room' => Room::class
    ];
    public static function postItems($serial, $items)
    {
        return (new static)->execute("%s/$serial/items", $items, 'POST');
    }

    public static function close($serial)
    {
        return (new static)->execute("%s/$serial/close", [], 'PUT');
    }

    public static function open($serial)
    {
        return (new static)->execute("%s/$serial/open", [], 'PUT');
    }

    public static function scoring($serial)
    {
        return (new static)->execute("%s/$serial/scoring", [], 'POST');
    }

    public function getSerialAttribute()
    {
        return [substr($this->id, 0, 1), substr($this->id, 1)];
    }
}
