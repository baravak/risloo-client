<?php
namespace App;

use Carbon\Carbon;

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

    // public function getStartedAtAttribute(){
    //     return $this->fromUTCToTimezone($this->attributes['started_at']);
    // }
    // public function getFinishedAtAttribute()
    // {
    //     return $this->fromUTCToTimezone($this->attributes['finished_at']);
    // }
}
