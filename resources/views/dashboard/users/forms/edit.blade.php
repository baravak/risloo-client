@if (request()->ajax())
@include('davat.layouts.headerUser')
@endif
@extends('dashboard.create')
@section('form-tag')
    <div class="mx-auto w-full sm:w-1/2">
        <ul data-tabs>
            @if (auth()->isAdmin())
            <li>
                <a href="#basic-tab" class="direct hidden md:flex" title="{{ __('Basic info') }}">{{ __('Basic info') }}</a>
                <a href="#basic-tab" class="direct flex md:hidden" title="{{ __('Basic info') }}">
                    <i class="fal fa-info text-2xl"></i>
                </a>
            </li>
            @endif
            <li>
                <a data-tabby-default href="#personal-tab" class="direct hidden md:flex" title="{{ __('Personal info') }}">{{ __('Personal info') }}</a>
                <a href="#personal-tab" class="direct flex md:hidden" title="{{ __('Personal info') }}">
                    <i class="fal fa-address-card text-2xl"></i>
                </a>
            </li>
            <li>
                <a href="#password-tab" class="direct hidden md:flex" title="{{ __('Password') }}">{{ __('Password') }}</a>
                <a href="#password-tab" class="direct flex md:hidden" title="{{ __('Password') }}">
                    <i class="fal fa-unlock-alt text-2xl"></i>
                </a>
            </li>
            <li>
                <a href="#avatar-tab" class="direct hidden md:flex" title="{{ __('Avatar') }}">{{ __('Avatar') }}</a>
                <a href="#avatar-tab" class="direct flex md:hidden" title="{{ __('Avatar') }}">
                    <i class="fal fa-user-circle text-2xl"></i>
                </a>
            </li>
            <li>
                <a href="#key-tab" class="direct hidden md:flex" title="{{ __('Public key') }}">{{ __('Public key') }}</a>
                <a href="#key-tab" class="direct flex md:hidden" title="{{ __('Public key') }}">
                    <i class="fal fa-key text-2xl"></i>
                </a>
            </li>
        </ul>

        @if (auth()->isAdmin())
            <div id="basic-tab" class="p-4 border border-gray-200 rounded">
                @includeFirst(['dashboard.users.forms.' . $user->type . '.basic', 'dashboard.users.forms.edit.basic', 'dashboard.users.forms.edit._basic'], ['some' => 'data'])
            </div>
        @endif

        <div id="personal-tab" class="p-4 border border-gray-200 rounded">
            @includeFirst(['dashboard.users.forms.' . $user->type . '.personal', 'dashboard.users.forms.edit.personal', 'dashboard.users.forms.edit._personal'], ['some' => 'data'])
        </div>

        <div id="password-tab" class="p-4 border border-gray-200 rounded">
            @includeFirst(['dashboard.users.forms.' . $user->type . '.password', 'dashboard.users.forms.edit.password', 'dashboard.users.forms.edit._password'], ['some' => 'data'])
        </div>

        @includeFirst(['dashboard.users.forms.' . $user->type . '.avatar', 'dashboard.users.forms.edit.avatar', 'dashboard.users.forms.edit._avatar'], ['some' => 'data'])


        <div id="key-tab" class="p-4 border border-gray-200 rounded">
            @include('dashboard.users.forms.edit._publicKey')
        </div>
    </div>
@endsection
