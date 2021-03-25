<?php
namespace App;

class UserDashboard extends User
{
    public $table = 'users';
    public function _dashboard($id, array $params = [])
    {
        return $this->cache('users/' . $id . '/profile' , $params);
    }
}
