<?php
namespace App;

class TherapyCaseUser extends API
{
    public $parent = TherapyCase::class;
    public $endpointPath = 'cases/%s/users';
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
