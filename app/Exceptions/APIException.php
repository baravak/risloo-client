<?php
namespace App\Exceptions;

use Exception as EX;

class APIException extends EX
{
    public $response;
    public function __construct($response)
    {
        $this->response = $response;
    }
}
