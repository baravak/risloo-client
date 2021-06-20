<?php
namespace App;

class SessionPlatformRoom extends API
{
    protected $parent = Room::class;
    public $endpointPath = 'rooms/%s/settings/session-platforms';
    public static function apiUpdate($room, $id, array $params = [])
    {
        $model = new static;
        return $model->execute(sprintf($model->endpointPath, $room) ."/$id", $params, 'put');
    }

}
