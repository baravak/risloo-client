@extends('dashboard.create')
@section('form-tag')
    <div class="mx-auto w-full sm:w-1/2">
        <ul data-tabs>
            <li><a href="#sessions-seetings" data-tabby-default class="direct focus flex" title="{{ __('Sessions Settings') }}">{{ __('Sessions Settings') }}</a></li>
        </ul>
        <div id="sessions-seetings">
            @include('dashboard.settings.centers.sessionsSettings')
        </div>
    </div>
@endsection