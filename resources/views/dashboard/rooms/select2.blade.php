@foreach ($rooms as $room)
    <div data-id="{{ $room->id }}">
        <div data-selection>
            <div class="text-sm text-gray-700 font-medium">@displayName($room->manager)</div>
            <div class="text-xs text-gray-400">
                @if ($room->type == 'room')
                    {{ $room->center->detail->title }}
                @else
                    {{ __('Personal_clinic') }}
                @endif
            </div>
        </div>
    </div>
@endforeach