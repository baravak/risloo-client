<?php
namespace App;


class Session extends API
{
    public $with = [
        'client' => User::class,
        'case' => TherapyCase::class,
        'room' => Room::class,
        'fields' => Field::class
    ];
    protected $casts = [
        'started_at' => 'datetime',
        'finished_at' => 'datetime',
        'updated_at' => 'datetime',
        'created_at' => 'datetime',
    ];

    public static function apiStore($case, array $params)
    {
        $store = new static;
        return $store->execute(sprintf("cases/%s/sessions", $case ?: '-'), $params, 'post');
    }
    public function setRoutes($attr){
        $this->route = [
            'show' => route('dashboard.sessions.show', $attr['id']),
            'edit' => route('dashboard.sessions.edit', $attr['id']),
            'update' => route('dashboard.sessions.update', $attr['id'])
        ];
    }
}
