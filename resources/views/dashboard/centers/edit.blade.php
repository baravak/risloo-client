@extends('dashboard.create')
@section('form-tag')
    <div class="mx-auto w-full sm:w-1/2">
        <ul data-tabs>
            <li><a href="#information-tab" data-tabby-default class="direct">{{ __('information') }}</a></li>
            <li><a href="#avatar-tab" class="direct">{{ __('Avatar') }}</a></li>
        </ul>

            <div id="information-tab" class="p-4 border border-gray-200 rounded">
                @include('dashboard.centers.editInformation')
            </div>
            <div id="avatar-tab" class="p-4 border border-gray-200 rounded">
                @include('dashboard.centers.editAvatar')
            </div>
    </div>
@endsection
