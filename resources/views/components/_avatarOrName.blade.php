@if ($_userAvatar->avatar && ($_avatar = $_userAvatar->avatar->where('mode', 'small')->first()))
    <img src="{{ $_avatar->url }}" class="w-full h-full object-cover object-center" alt="{{ $_userAvatar->shortName }}">
@else
    <span>{{ $_userAvatar->shortName }}</span>
@endif
