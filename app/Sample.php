<?php
namespace App;

class Sample extends API
{
    public $endpointPath = '$/samples';
    public $with = [
        'user' => User::class,
        'client' => User::class,
        'room' => Room::class,
        'case' => Relationship::class,
    ];
    public static function postItems($serial, $items)
    {
        return (new static)->execute("%s/$serial/items", $items, 'POST');
    }

    public static function close($serial)
    {
        return (new static)->execute("%s/$serial/close", [], 'POST');
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
