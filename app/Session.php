<?php
namespace App;


class Session extends API
{
    public $with = [
        'client' => User::class,
        'case' => TherapyCase::class,
        'room' => Room::class,
        'fields' => Field::class,
    ];
    protected $casts = [
        'started_at' => 'datetime',
        'finished_at' => 'datetime',
        'opens_at' => 'datetime',
        'closed_at' => 'datetime',
        'canceled_at' => 'datetime',
        'group_session' => 'boolean'
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

    public function getOpensRelativeDaysAttribute(){
        return $this->actionRelative('days', $this->opens_at);
    }

    public function getOpensRelativeHoursAttribute(){
        return $this->actionRelative('hours', $this->opens_at);
    }

    public function getOpensRelativeMinutesAttribute(){
        return $this->actionRelative('minutes', $this->opens_at);
    }

    public function getClosedRelativeDaysAttribute(){
        return $this->actionRelative('days', $this->closed_at);
    }

    public function getClosedRelativeHoursAttribute(){
        return $this->actionRelative('hours', $this->closed_at);
    }

    public function getClosedRelativeMinutesAttribute(){
        return $this->actionRelative('minutes', $this->closed_at);
    }

    private function actionRelative($result, $time){
        if(!$time) return null;
        $rt = $this->started_at->timestamp - $time->timestamp;
        $days = floor($rt / (60 * 60 * 24));
        if($result == 'days'){
            return $days;
        }
        $tDays = $days * 60 * 60 * 24;

        $hours = floor(($rt - $tDays) / (60 * 60));
        if($result == 'hours'){
            return $hours;
        }

        $tHours = $hours * 60 * 60;

        return floor(($rt - $tDays - $tHours) / (60));
    }
}
