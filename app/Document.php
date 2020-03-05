<?php
namespace App;

use Symfony\Component\HttpFoundation\Cookie;

class Document extends API
{
    protected $guarded = [];
    public function getSerialAttribute()
    {
        return [substr($this->id, 0, 1), substr($this->id, 1)];
    }
}
