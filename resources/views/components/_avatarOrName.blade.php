@if ($_userAvatar->avatar && ($_avatar = $_userAvatar->avatar->where('mode', 'small')->first()))
    <img src="{{ $_avatar->url }}" class="w-full h-full object-cover object-center" title="{{ $_userAvatar->name }}" alt="{{ $_userAvatar->name }}">
@else
    <span title="{{ $_userAvatar->name }}">{{ $_userAvatar->shortName }}</span>
@endif
