@extends('dashboard.create')

@section('form-tag')

    @if (auth()->isAdmin())
        <div class="m-auto w-full sm:w-1/2 mt-8">
            <div class="p-4 border border-gray-200 rounded">
                <div class="flex items-center">
                    <span class="w-8 border-t border-gray-200 inline-block ml-3"></span>
                    <h3 class="font-semibold text-gray-800">{{ __('Basic info') }}</h3> 
                </div>               
                @includeFirst(['dashboard.users.forms.' . $user->type . '.basic', 'dashboard.users.forms.edit.basic', 'dashboard.users.forms.edit._basic'], ['some' => 'data'])
            </div>
        </div>
    @endif

    <div class="m-auto w-full sm:w-1/2 mt-8">
        <div class="p-4 border border-gray-200 rounded">
            <div class="flex items-center">
                <span class="w-8 border-t border-gray-200 inline-block ml-3"></span>
                <h3 class="font-semibold text-gray-800">{{ __('Personal info') }}</h3> 
            </div>                
            @includeFirst(['dashboard.users.forms.' . $user->type . '.personal', 'dashboard.users.forms.edit.personal', 'dashboard.users.forms.edit._personal'], ['some' => 'data'])
        </div>
    </div>

    <div class="m-auto w-full sm:w-1/2 mt-8">
        <div class="p-4 border border-gray-200 rounded">
            <div class="flex items-center">
                <span class="w-8 border-t border-gray-200 inline-block ml-3"></span>
                <h3 class="font-semibold text-gray-800">{{ __('Password') }}</h3> 
            </div>           
            @includeFirst(['dashboard.users.forms.' . $user->type . '.password', 'dashboard.users.forms.edit.password', 'dashboard.users.forms.edit._password'], ['some' => 'data'])
        </div>
    </div>

    <div class="m-auto w-full sm:w-1/2 mt-8">
        <div class="p-4 border border-gray-200 rounded">
            <div class="flex items-center">
                <span class="w-8 border-t border-gray-200 inline-block ml-3"></span>
                <h3 class="font-semibold text-gray-800">{{ __('Avatar') }}</h3> 
            </div>           
            @includeFirst(['dashboard.users.forms.' . $user->type . '.avatar', 'dashboard.users.forms.edit.avatar', 'dashboard.users.forms.edit._avatar'], ['some' => 'data'])
        </div>
    </div>

    <div class="m-auto w-full sm:w-1/2 mt-8">
        <div class="p-4 border border-gray-200 rounded">
            <div class="flex items-center">
                <span class="w-8 border-t border-gray-200 inline-block ml-3"></span>
                <h3 class="font-semibold text-gray-800">{{ __('Public key') }}</h3> 
            </div>           
            @include('dashboard.users.forms.edit._publicKey')
        </div>
    </div>
@endsection