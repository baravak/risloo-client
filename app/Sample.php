<?php
namespace App;

class Assessment extends API
{
    public $endpointPath = '$/samples';
    public function getSerialAttribute()
    {
        return [substr($this->id, 0, 1), substr($this->id, 1)];
    }
}
