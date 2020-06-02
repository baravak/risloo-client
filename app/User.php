<?php

namespace App;
use App\Models\_User;

class User extends _User
{
    public function __construct()
    {
        $this->with['counseling_center'] = Relationship::class;
        $this->with['centers'] = Relationship::class;
        $this->with['center'] = Relationship::class;
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
        return $this->created_at->timestamp % 16;
    }
}
