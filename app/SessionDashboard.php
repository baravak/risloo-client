<?php
namespace App;

class SessionDashboard extends Session
{
    public $parent = TherapyCase::class;
    public $with = [
        'client' => User::class,
        'case' => TherapyCase::class,
        'practices' => Practice::class,
        'samples' => Sample::class,
        'room' => Room::class,
        'fields' => Field::class,
        'clients' => User::class,
        'transactions' => PublicTransaction::class,

    ];
    public function parentClass($parent){
        return $parent == 'room' ? Room::class : $this->parent;
    }
    public $table = 'sessions';
    public function _dashboard($id, array $params = [])
    {
        return $this->cache('sessions/' . $id .'/dashboard' , $params);
    }
    public function setRoutes($attr){
        $this->route = [
            'show' => route('dashboard.sessions.show', $attr['id']),
            'edit' => route('dashboard.sessions.edit', $attr['id']),
            'update' => route('dashboard.sessions.update', $attr['id'])
        ];
    }
}
