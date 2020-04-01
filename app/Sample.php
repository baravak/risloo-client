<?php
namespace App;

class Sample extends API
{
    public $endpointPath = '$/samples';
    // public function route($name)
    // {
    //     $route = parent::route($name);
    //     if(in_array($name, ['show']))
    //     {
    //         $route = str_replace('/$/$', '/$/', $route);
    //     }
    //     return $route;
    // }
    // public function getSerialAttribute()
    // {
    //     return [substr($this->id, 0, 1), substr($this->id, 1)];
    // }
}
