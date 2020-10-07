<div class="card m-3 col-12" id="calendar" data-from="{{$reserves->getFilter('week')[0]}}" data-to="{{$reserves->getFilter('week')[1]}}">
    <div class="card-header">
        {{__("Calendar")}}
    </div>
    <div class="card-body" style="min-width: 700px;">
        <div class="d-flex reserve-table-th">
            <div style="width: 10%">&nbsp;</div>
            <div class="table-reserve-data d-flex align-items-right" style="width: 90%">
                @foreach ($table as $hour)
                    <div style="width: {{(100 / count($table))}}%" class="text-right">{{$hour}}</div>
                @endforeach
            </div>
        </div>
        @for ($i = 0; $i < 7; $i++)
        @php
            $dayOfWeek = JDate::fromDateTime($reserves->getFilter('week')[0])->addDays($i);
            $indexGroup = $dayOfWeek->toCarbon()->format('Ymd');
        @endphp
        <div class="d-flex">
            <div class="table-reserve-title" style="width: 10%">{{$dayOfWeek->format('%A')}}</div>
            <div class="table-reserve-data d-flex align-items-center position-relative" style="width: 90%">
                @isset($group[$indexGroup])
                @foreach ($group[$indexGroup] as $item)
                    <div class="table-reserve-time position-absolute" style="overflow: hidden; right:{{$item->tablePosition->start}}%;width: {{$item->tablePosition->length}}%;" data-start="08:00" data-end="20:00">
                        {{$item->started_at->format('G:i')}}
                        -
                        {{$item->finished_at->format('G:i')}}
                    </div>
                @endforeach
                @endisset
            </div>
        </div>
        @endfor
    </div>
</div>
