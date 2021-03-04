<?php
namespace App;

class CenterUser extends API
{
    public $parent = Center::class;
    public $endpointPath = 'centers/%s/users';
    public $with = [
        'user' => User::class,
        'creator' => User::class,
        'rooms' => Room::class,
        'cases' => TherapyCase::class,
        'samples' => SampleSummary::class,
        'avatar' => avatar::class,
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
    public function _childshow($center, $user, array $params = [])
    {
        return $this->cache(sprintf($this->endpointPath . '/%s', $center, $user));
    }

    public function _dashboard($center, $user, array $params = [])
    {
        return $this->cache('centers/' . $center .'/users/' . $user . '/profile', $params);
    }
    public function getShortNameAttribute()
    {
        if(!$this->name)
        {
            return mb_substr($this->id, 2, 2) . mb_substr($this->id, -2, 2);
        }
        $word = mb_split(' ', $this->name);
        if(count($word) == 1)
        {
            return mb_substr($word[0], 0, 2);
        }
        else
        {
            return mb_substr($word[0], 0, 1) . mb_substr($word[count($word)-1], 0, 1);
        }
    }
    public function getAvatarUrlAttribute()
    {
        return new Avatar($this->avatar);
    }
}
