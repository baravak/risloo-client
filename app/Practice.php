<?php
namespace App;


class Practice extends API
{
    public $parent = Session::class;
    public $endpointPath = 'sessions/%s/practices';
    public $with = [
        'attachments' => File::class,
    ];
    public function getSerialAttribute()
    {
        return [substr($this->id, 0, 1), substr($this->id, 1)];
    }
}
