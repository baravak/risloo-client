@extends('dashboard.create')

@section('form-tag')
    <div class="mx-auto w-full sm:w-1/2">
        <ul data-tabs>
            <li><a data-tabby-default href="#basic" class="direct">{{ __('Basic info') }}</a></li>
            <li><a href="#personal" class="direct">{{ __('Personal info') }}</a></li>
            <li><a href="#password1" class="direct">{{ __('Password') }}</a></li>
            <li><a href="#avatar" class="direct">{{ __('Avatar') }}</a></li>
            <li><a href="#key" class="direct">{{ __('Public key') }}</a></li>
        </ul>

        @if (auth()->isAdmin())
            <div id="basic" class="p-4 border border-gray-200 rounded">
                @includeFirst(['dashboard.users.forms.' . $user->type . '.basic', 'dashboard.users.forms.edit.basic', 'dashboard.users.forms.edit._basic'], ['some' => 'data'])
            </div>
        @endif

        <div id="personal" class="p-4 border border-gray-200 rounded">
            @includeFirst(['dashboard.users.forms.' . $user->type . '.personal', 'dashboard.users.forms.edit.personal', 'dashboard.users.forms.edit._personal'], ['some' => 'data'])
        </div>

        <div id="password1" class="p-4 border border-gray-200 rounded">
            @includeFirst(['dashboard.users.forms.' . $user->type . '.password', 'dashboard.users.forms.edit.password', 'dashboard.users.forms.edit._password'], ['some' => 'data'])
        </div>

        <div id="avatar" class="p-4 border border-gray-200 rounded">
            @includeFirst(['dashboard.users.forms.' . $user->type . '.avatar', 'dashboard.users.forms.edit.avatar', 'dashboard.users.forms.edit._avatar'], ['some' => 'data'])
        </div>

        <div id="key" class="p-4 border border-gray-200 rounded">
            @include('dashboard.users.forms.edit._publicKey')
        </div>
    </div>
@endsection