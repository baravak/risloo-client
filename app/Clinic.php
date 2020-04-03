<?php
namespace App;

class Clinic extends API
{
    public $with = [
        'owner' => User::class,
        'manager' => User::class,
        'creator' => User::class,
    ];
    protected $casts = [
        'kicked_at' => 'datetime',
        'accepted_at' => 'datetime',
        'joined_at' => 'datetime',
    ];

    public static function request($clinic_id)
    {
        return (new static)->execute('clinics/request', ['clinic_id' => $clinic_id], 'POST');
    }
}
