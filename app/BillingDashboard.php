<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BillingDashboard extends BillingItem
{
    protected $parent = Billing::class;
    public $with = [
        'user' => User::class,
        'creditor' => Treasury::class,
        'debtor' => Treasury::class,
    ];
    public function _dashboard($id, array $params = [])
    {
        return $this->cache('billings/' . $id .'/dashboard' , $params);
    }
}
