<?php
namespace App;

use GuzzleHttp\Psr7\Request;

class BulkSample extends API
{
    public $endpointPath = 'bulk-samples';
    public $with = [
        'room' => Room::class,
        'case' => TherapyCase::class,
        'cases' => TherapyCase::class,
        'scales' => Assessment::class,
        'samples' => Sample::class
    ];
}
