@extends('dashboard.create')
@section('form-tag')
    <div class="mx-auto w-full sm:w-1/2">
        <ul data-tabs>
            <li><a href="#information-tab" data-tabby-default class="direct focus flex" title="{{ __('information') }}">{{ __('information') }}</a></li>
            <li><a href="#avatar-tab" class="direct focus flex" title="{{ __('Avatar') }}">{{ __('Avatar') }}</a></li>
        </ul>

            <div id="information-tab">
                @include('dashboard.centers.editInformation')
            </div>
            <div id="avatar-tab">
                @include('dashboard.centers.editAvatar')
            </div>
    </div>
@endsection
