<?php
namespace App;

use GuzzleHttp\Psr7\Request;

class BulkSample extends API
{
    public $endpointPath = '$/samples';
    public $with = [
        'room' => Room::class,
        'case' => TherapyCase::class,
    ];
}
