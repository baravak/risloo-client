<?php
namespace App;

class RoomDashboard extends TherapyCase
{
    public $parent = Room::class;
    public $table = 'cases';
    public function _dashboard($id, array $params = [])
    {
        return $this->cache('rooms/' . $id .'/dashboard' , $params);
    }
}
