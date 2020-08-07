<?php
namespace App;

class Document extends Relationship
{
    public $with = [
        'attachments' => File::class,
    ];
    public function getSerialAttribute()
    {
        return [substr($this->id, 0, 1), substr($this->id, 1)];
    }
}
