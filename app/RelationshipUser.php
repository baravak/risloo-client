<?php
namespace App;

class RelationshipUser extends API
{
    public $parent = Relationship::class;
    public $endpointPath = 'relationships/%s/users';
    public $with = [
        'user' => User::class,
        'creator' => User::class
    ];
}
