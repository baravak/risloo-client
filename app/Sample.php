<?php
namespace App;

class Sample extends API
{
    public $endpointPath = '$/samples';

    public static function postItems($serial, $items)
    {
        return (new static)->execute("%s/$serial/items", ['items' => $items], 'POST');
    }

    public static function close($serial)
    {
        return (new static)->execute("%s/$serial/close", [], 'POST');
    }
    // public function route($name)
    // {
    //     $route = parent::route($name);
    //     if(in_array($name, ['show']))
    //     {
    //         $route = str_replace('/$/$', '/$/', $route);
    //     }
    //     return $route;
    // }
    public function getSerialAttribute()
    {
        return [substr($this->id, 0, 1), substr($this->id, 1)];
    }
}
