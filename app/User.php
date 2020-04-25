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
}
