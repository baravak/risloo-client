<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Billing extends API
{
    public $with = [
        'user' => User::class
    ];
    public static function doFinal($id, array $params = [])
    {
        return (new static)->cache('billings/' . $id .'/final' , $params, 'POST');
    }
}
