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
    protected $casts = [
        'kicked_at' => 'datetime',
        'accepted_at' => 'datetime',
        'updated_at' => 'datetime',
        'created_at' => 'datetime',
    ];
}
