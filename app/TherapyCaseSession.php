<?php
namespace App;

class TherapyCaseSession extends API
{
    protected $routeResource = 'sessions';
    protected $casts = [
        'started_at' => 'datetime',
        'finished_at' => 'datetime',
        'reserved_at' => 'datetime',
        'accepted_at' => 'datetime',
        'canceled_at' => 'datetime'
    ];
    public function setRoutes($attr){
        $this->route = [
            'show' => route('dashboard.sessions.show', $attr['id']),
            'edit' => route('dashboard.sessions.edit', $attr['id']),
            'update' => route('dashboard.sessions.update', $attr['id'])
        ];
    }
}
