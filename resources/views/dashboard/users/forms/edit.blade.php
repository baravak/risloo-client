@if (request()->ajax())
    @include('davat.layouts.headerUser')
@endif
@extends('dashboard.create')
@section('form-tag')
    <div class="mx-auto w-full sm:w-1/2">
        <ul data-tabs>
            @if (auth()->isAdmin())
            <li>
                <a href="#basic-tab" class="direct focus" title="{{ __('Basic info') }}" aria-label="{{ __('Basic info') }}">
                    <span class="hidden md:block">{{ __('Basic info') }}</span>
                    <i class="fal fa-info text-xl block md:hidden"></i>
                </a>
            </li>
            @endif
            <li>
                <a data-tabby-default href="#personal-tab" class="direct focus" title="{{ __('Personal info') }}" aria-label="{{ __('Personal info') }}">
                    <span class="hidden md:block">{{ __('Personal info') }}</span>
                    <i class="fal fa-address-card text-xl block md:hidden"></i>
                </a>
            </li>
            <li>
                <a href="#password-tab" class="direct focus" title="{{ __('Password') }}" aria-label="{{ __('Password') }}">
                    <span class="hidden md:block">{{ __('Password') }}</span>
                    <i class="fal fa-unlock-alt text-xl block md:hidden"></i>
                </a>
            </li>
            <li>
                <a href="#avatar-tab" class="direct focus" title="{{ __('Avatar') }}" aria-label="{{ __('Avatar') }}">
                    <span class="hidden md:block">{{ __('Avatar') }}</span>
                    <i class="fal fa-user-circle text-xl block md:hidden"></i>
                </a>
            </li>
            <li>
                <a href="#key-tab" class="direct focus" title="{{ __('Public key') }}" aria-label="{{ __('Public key') }}">
                    <span class="hidden md:block">{{ __('Public key') }}</span>
                    <i class="fal fa-key text-xl block md:hidden"></i>
                </a>
            </li>
        </ul>

        @if (auth()->isAdmin())
            <div id="basic-tab">
                @includeFirst(['dashboard.users.forms.' . $user->type . '.basic', 'dashboard.users.forms.edit.basic', 'dashboard.users.forms.edit._basic'], ['some' => 'data'])
            </div>
        @endif

        <div id="personal-tab">
            @includeFirst(['dashboard.users.forms.' . $user->type . '.personal', 'dashboard.users.forms.edit.personal', 'dashboard.users.forms.edit._personal'], ['some' => 'data'])
        </div>

        <div id="password-tab">
            @includeFirst(['dashboard.users.forms.' . $user->type . '.password', 'dashboard.users.forms.edit.password', 'dashboard.users.forms.edit._password'], ['some' => 'data'])
        </div>

        @includeFirst(['dashboard.users.forms.' . $user->type . '.avatar', 'dashboard.users.forms.edit.avatar', 'dashboard.users.forms.edit._avatar'], ['some' => 'data'])

        <div id="key-tab">
            @include('dashboard.users.forms.edit._publicKey')
        </div>
    </div>
@endsection