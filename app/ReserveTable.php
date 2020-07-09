<?php
namespace App;

class ReserveTable
{
    public $hours, $group;
    public function __construct($reserves)
    {
        $hours = $this->fillHours($reserves);
        $hours = $this->minLength($hours);
        $hours = $this->spaces($hours);
        foreach ($hours as $key => $hour) {
            if(!is_int($hour)){
                $hours[$key] = '...';
            }
        }
        $this->hours = $hours;
        $positions = [];
        $this->group = $groups = $this->groupByDay($reserves);
        $this->tablePosition($groups);
    }

    public function fillHours($reserves){
        $hours = [];
        foreach ($reserves as $key => $item) {
            $hours[] = (int) $item->started_at->format('H');
            $hours[] = (int) $item->finished_at->format('H');
        }
        $hours = array_unique($hours);
        sort($hours);
        return $hours;
    }

    public function minLength($hours)
    {
        if (max($hours) - min($hours) < 5) {
            if (min($hours) - 1 >= 7) {
                array_unshift($hours, min($hours) - 1);
            } else {
                array_push($hours, min($hours) + 1);
            }
            if (max($hours) + 1 <= 22) {
                array_push($hours, max($hours) + 1);
            } else {
                array_unshift($hours, min($hours) - 2);
            }
            $change = [];
            for ($i = min($hours); $i <= max($hours); $i++) {
                $change[] = $i;
            }
            return $change;
        }
        return $hours;
    }
    public function spaces($hours)
    {
        $change = $hours;
        for ($i=1; $i < count($hours); $i++) {
            if($hours[$i] - $hours[$i - 1] > 3)
            {
                $change[] = $hours[$i - 1] + .3;
            }
        }
        sort($change);
        return $change;
    }

    private function startPosition($started_at){
        $hour = (int) $started_at->format('H');
        $minute = (int) $started_at->format('i');
        $start = array_search($hour, $this->hours) * 60 + $minute;
        return ($start * 100) / $this->getMax();
    }

    private function getMax(){
        return count($this->hours) * 60;
    }

    private function lengthPosition($item)
    {
        $length = ($item->finished_at->timestamp - $item->started_at->timestamp) / 60;
        return ($length * 100) / $this->getMax();
    }
    public function groupByDay($reserves){
        $days = [];
        foreach ($reserves as $key => $item)
        {
            $group = $item->started_at->format('Ymd');
            if(!isset($days[$group]))
            {
                $days[$group] = [];
            }
            $days[$group][] = $item;
        }
        return $days;
    }
    public function tablePosition($groups){
        foreach ($groups as $group => $items) {
            foreach ($items as $key => $item) {
                $prefix = $key ? $items[$key - 1]->tablePosition->end : 0;
                $tablePosition = new \stdClass();
                $tablePosition->start = $this->startPosition($item->started_at);
                $tablePosition->length = $this->lengthPosition($item);
                $tablePosition->end = $tablePosition->start + $tablePosition->length;
                $item->tablePosition = $tablePosition;
            }
        }
    }
}
