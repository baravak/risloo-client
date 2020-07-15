<?php
namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Morilog\Jalali\Jalalian;
class ReserveCalendar
{
    public $hours, $calendar;
    public function __construct($reserves)
    {
        $week = $reserves->getFilter('week');
        $start = Carbon::createFromTimestamp($week[0]);
        $days = [];
        for ($i=0; $i < 7; $i++) {
            $date = $start->copy()->addDays($i);
            $jdate = Jalalian::fromCarbon($date);
            $days[$date->format('Ymd')] = [
                'title' => $jdate->format('%A'),
                'date' => $jdate->format('Y/m/d'),
                'items' => []
            ];
        }
        $this->hours = $this->fillHours($reserves);
        foreach ($reserves as $key => $item) {
            $group = $item->started_at->format('Ymd');
            $days[$group]['items'][] = $item;
        }
        $n_days = [];
        foreach ($days as $key => $value) {
            if(count($value['items']))
            {
                $n_days[] = $value;
            }
        }
        $days = $n_days;
        $this->tablePosition($days);
        foreach ($days as $key => $value) {
            $days[$key]['items'] = new Collection($value['items']);
        }
        $this->calendar = $days;
    }
    public function fillHours($reserves)
    {
        $hours = [];
        foreach ($reserves as $key => $item) {
            $hours[] = (int) $item->started_at->format('H');
            $hours[] = (int) $item->finished_at->format('H');
        }
        $hours = array_unique($hours);
        sort($hours);
        $hours = $this->minLength($hours);
        $hours = $this->spaces($hours);
        foreach ($hours as $key => $hour) {
            if (!is_int($hour)) {
                $hours[$key] = '...';
            }
        }
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
        for ($i = 1; $i < count($hours); $i++) {
            if ($hours[$i] - $hours[$i - 1] > 3) {
                $change[] = $hours[$i - 1] + .3;
            } elseif ($hours[$i] - $hours[$i - 1] == 2) {
                $change[] = $hours[$i - 1] + 1;
            }
        }
        sort($change);
        return $change;
    }

    public function tablePosition($days)
    {
        foreach ($days as $day => $value) {
            $items = $value['items'];
            foreach ($items as $key => $item) {
                $prefix = $key ? $items[$key - 1]->tablePosition->end : 0;
                $tablePosition = new \stdClass();
                $tablePosition->start = $this->startPosition($item->started_at);
                $tablePosition->length = $this->length($item);
                $tablePosition->end = $tablePosition->start + $tablePosition->length;
                $item->calendarRow = array_search((int) $item->started_at->format('H'), $this->hours);
                $item->calendarResume = $item->started_at->format('H') < $item->finished_at->format('H') && $item->finished_at->format('i') != '0' ? $item->calendarRow + 1 : -1;
                $item->tablePosition = $tablePosition;
            }
        }
    }

    private function startPosition($started_at)
    {
        // $hour = (int) $started_at->format('H');
        $minute = (int) $started_at->format('i');
        // $start = array_search($hour, $this->hours) * 60 + $minute;
        $start = $minute;
        return ($start * 100) / $this->getMax();
    }

    private function getMax()
    {
        return 60;
        // return count($this->hours) * 60;
    }

    private function length($item)
    {
        $length = ($item->finished_at->timestamp - $item->started_at->timestamp) / 60;
        return ($length * 100) / $this->getMax();
    }
}
