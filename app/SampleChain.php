<?php
namespace App;

use GuzzleHttp\Psr7\Request;

class SampleChain extends API
{
    public $with = [
        'list' => Sample::class
    ];
}
