@if ($_avatar = $_userAvatar->avatar_url->get('small'))
    <img src="{{$_avatar->url}}" class="w-full h-full object-cover object-center">
@else
    <span>{{ $_userAvatar->shortName }}</span>
@endif