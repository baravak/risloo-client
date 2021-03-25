@foreach ($rooms as $room)
    <div data-id="{{ $room->id }}">
        <div data-selection class="text-xs pt-1">
            <div class="text-gray-700 font-semibold">@displayName($room->manager)</div>
            <div class="text-gray-500">
                @if ($room->type == 'room')
                    {{ $room->center->detail->title }}
                @else
                    {{ __('Personal_clinic') }}
                @endif
            </div>
        </div>
    </div>
@endforeach