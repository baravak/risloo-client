<?php
namespace App;

class Reserve extends API
{
    public $with = [
        'owner' => User::class,
        'manager' => User::class,
        'creator' => User::class,
        'center' => Relationship::class,
    ];
    protected $casts = [
        'started_at' => 'datetime',
        'finished_at' => 'datetime',
        'updated_at' => 'datetime',
        'created_at' => 'datetime',
    ];
}
