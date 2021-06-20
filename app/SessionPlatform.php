<?php
namespace App;

class SessionPlatform extends API
{
    protected $parent = Center::class;
    public $endpointPath = 'centers/%s/settings/session-platforms';
    public static function apiUpdate($center, $id, array $params = [])
    {
        $model = new static;
        return $model->execute(sprintf($model->endpointPath, $center) ."/$id", $params, 'put');
    }

    public static function apiShow($center, $id, array $params = [])
    {
        $model = new static;
        return $model->execute(sprintf($model->endpointPath, $center) ."/$id", $params, 'get');
    }

}
