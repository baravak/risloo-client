<?php
namespace App;

class TherapyCase extends API
{
    protected $routeResource = 'cases';
    public $endpointPath = 'cases';
    public $with = [
        'owner' => User::class,
        'manager' => User::class,
        'creator' => User::class,
        'clients' => RelationshipUser::class,
        'sessions' => TherapyCaseSession::class,
        'samples' => Sample::class,
        'room' => Room::class
    ];

    public static function apiStore($room, array $params)
    {
        $store = new static;
        return $store->execute(sprintf("rooms/%s/cases", $room ?: '-'), $params, 'post');
    }
    public function _roomCases($id, array $params = [])
    {
        $this->parent = Room::class;
        return $this->cache('rooms/' . $id .'/cases' , $params);
    }

    public function setRoutes($attr){
        try{
            $room = $this->parentModel ?: $this->room;
            if(!$room){
                $this->route = [
                    'show' => route('dashboard.cases.show', $this->id)
                ];
                return;
            }
            $this->route = [
                'index' => route('dashboard.rooms.show', $room->id),
                'show' => route('dashboard.cases.show', $this->id),
                // 'edit' => route('dashboard.cases.edit', $this->id),
                // 'update' => route('dashboard.cases.update', $this->id),
                'create' => route('dashboard.room.cases.create', $room->id),
                'store' => route('dashboard.room.cases.store', $room->id)
            ];
        }catch(\Exception $e){}
    }

    public function _dashboard($id, array $params = [])
    {
        return $this->cache('cases/' . $id .'/dashboard' , $params);
    }
}
