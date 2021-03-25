<?php
namespace App;

class Room extends API
{
    public $with = [
        'owner' => User::class,
        'manager' => User::class,
        'creator' => User::class,
        'center' => Center::class,
        'acceptation' => RoomUser::class,
    ];

    public $filterWith = [
        'center' => Center::class,
    ];

    public $parent;

    public static function apiStore($center, array $params)
    {
        $store = new static;
        return $store->execute(sprintf("centers/%s/rooms", $center ?: '-'), $params, 'post');
    }

    public function getFilterValue(){
        return $this->manager->name;
    }

    public function _centerRooms($id, array $params = [])
    {
        $this->parent = Center::class;
        return $this->cache('centers/' . $id .'/rooms' , $params);
    }
}
