<?php

namespace App;
use App\Models\_User;

class User extends _User
{
    public function __construct()
    {
        $this->with['counseling_center'] = Center::class;
        $this->with['centers'] = Center::class;
        $this->with['center'] = Center::class;
        $this->with['rooms'] = Room::class;
        $this->with['cases'] = TherapyCase::class;
        $this->with['samples'] = SampleSummary::class;
        parent::__construct(...func_get_args());
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

    public function getColorAttribute()
    {
        if($this->created_at)
        {
            return $this->created_at->timestamp % 16;
        }
        else
        {
            return 0;
        }
    }
    public static function setPublicKey($user, array $params)
    {
        $store = new static;
        return $store->execute(sprintf("/users/%s/public-key", $user), $params, 'post');
    }
    public function _dashboard($id, array $params = [])
    {
        return $this->cache('users/' . $id .'/profile' , $params);
    }
}
