<?php
namespace App;


class ClientReport extends API
{
    public $endpointPath = 'client-reports/%s';
    public $with = [
        'clients' => User::class,
        'viewers' => User::class,
        'room' => Room::class,
        'case' => TherapyCase::class,
        'session' => Session::class,
    ];
    protected $casts = [
        'reported_at' => 'datetime'
    ];

    public function parentClass($parent){
        switch($parent){
            case 'therapysession': return Session::class;
            case 'ghost' : return User::class;
        }
        return TherapyCase::class;
    }
    public static function _all($serial, array $params){
        return (new static)->cache("client-reports/all/$serial", $params);
    }
    public static function apiShow($serial, array $params){
        return (new static)->cache("client-reports/$serial", $params);
    }
    public static function apiUpdate($serial, array $params){
        return (new static)->cache("client-reports/$serial", $params, 'PUT');
    }
}
