<?php
namespace App;

class CenterDashboard extends Room
{
    public $parent = Center::class;
    public $table = 'rooms';
    public function _dashboard($id, array $params = [])
    {
        return $this->cache('centers/' . $id .'/dashboard' , $params);
    }
}
