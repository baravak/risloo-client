<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TreasuryDashboard extends Transaction
{
    public $parent = Treasury::class;
    public $with = [
        'user' => User::class
    ];

    public function _dashboard($id, array $params = [])
    {
        return $this->cache('treasuries/' . $id .'/dashboard' , $params);
    }
}
