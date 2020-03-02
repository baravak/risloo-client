<?php
namespace App\Exceptions;

use Exception;

class APIException extends Exception
{
    protected $response;
    public function __construct($response)
    {
        $this->response = $response;
    }

    public function __call($name, $arguments)
    {
        return $this->response->$name(...$arguments);
    }

    public function __get($name)
    {
        $this->response->$name;
    }
}
