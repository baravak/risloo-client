<div class="card mt-3 col-12 col-md-11" id="calendar" data-url="{{route('dashboard.reserves.calendar')}}" data-from="{{$reserves->getFilter('week')[0]}}" data-to="{{$reserves->getFilter('week')[1]}}" data-xhr="calendar">
    @isset($calendar)
    <div class="card-header">
        {{__("Calendar")}}
    </div>
    <div class="card-body m-0 p-0">
        <table class="w-100 mt-1">
            <thead>
                <tr>
                    <td style="width: 5%"></ttdh>
                    @foreach ($calendar as $day)
                    <td class="{{!$loop->last ? 'border-left ' : ''}}text-center" style="width: {{95/ (count($calendar))}}%">
                        {{$day['title']}}
                        <div class="direction-ltr fs-12">
                            {{$day['date']}}
                        </div>
                    </td>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @foreach ($hours as $hour)
                <tr style="height: 4.5rem" class="border-top border-bottom">
                    <td class="text-center border-left border-right fs-10">{{is_int($hour) ? str_pad((string) $hour, 2, '0', STR_PAD_LEFT).':00' : $hour}}</td>
                    @php
                        $row = $loop->index;
                    @endphp
                    @foreach ($calendar as $day)
                    <td class="border-left border-top border-bottom position-relative m-0 p-0 {{!$day['items']->where('calendarRow', $row)->count() ? 'bg-light' : ''}}">
                        @foreach ($day['items']->where('calendarResume', $row) as $itemReserve)
                            <div class="p-2 fs-12">
                                <strong>{{$itemReserve->finished_at->diffInMinutes($itemReserve->finished_at->copy()->setMinute(0))}}</strong> دقیقه از جلسه قبلی
                                ( تا <strong>{{$itemReserve->finished_at->format('H:i')}}</strong>)
                            </div>
                        @endforeach
                        @foreach ($day['items']->where('calendarRow', $row) as $itemReserve)
                            <div class="p-2 fs-12">
                                از <strong>{{$itemReserve->started_at->format('H:i')}}</strong>
                                تا <strong>{{$itemReserve->finished_at->format('H:i')}}</strong>
                                به مدت <strong>{{$itemReserve->finished_at->diffInMinutes($itemReserve->started_at)}}</strong> دقیقه
                            </div>
                        @endforeach
                    </td>
                    @endforeach
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endisset
</div>
