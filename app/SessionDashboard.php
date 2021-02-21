<?php
namespace App;

class SessionDashboard extends Session
{
    public $parent = TherapyCase::class;
    public $with = [
        'client' => User::class,
        'case' => TherapyCase::class,
        'practices' => Practice::class,
        'samples' => Sample::class
    ];
    public $table = 'sessions';
    public function _dashboard($id, array $params = [])
    {
        return $this->cache('sessions/' . $id .'/dashboard' , $params);
    }
}
