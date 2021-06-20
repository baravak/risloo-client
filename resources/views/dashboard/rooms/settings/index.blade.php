@extends($layouts->dashboard)
@section('content')
    <div class="mx-auto w-full sm:w-1/2">
        <ul data-tabs>
            <li><a href="#sessions-seetings" data-tabby-default class="direct focus flex" title="{{ __('Sessions Settings') }}">{{ __('Sessions Settings') }}</a></li>
        </ul>
        <div id="sessions-seetings">
            @include('dashboard.rooms.settings.sessionsSettings')
        </div>
    </div>
@endsection
