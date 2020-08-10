<?php
namespace App;

class CenterUser extends API
{
    public $parent = Center::class;
    public $endpointPath = 'centers/%s/users';
    public $with = [
        'user' => User::class,
        'creator' => User::class
    ];
    protected $casts = [
        'kicked_at' => 'datetime',
        'accepted_at' => 'datetime',
        'updated_at' => 'datetime',
        'created_at' => 'datetime',
    ];
    public function _childUpdate($center, $user, array $params = [])
    {
        return $this->cache(sprintf($this->endpointPath.'/%s', $center, $user), $params, 'put');
    }
    public function _childshow($center, $user)
    {
        return $this->cache(sprintf($this->endpointPath . '/%s', $center, $user));
    }
}
