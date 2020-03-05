@extends('dashboard.create')
@section('form_action', isset($user) ? route('dashboard.users.update', ['id' => $user->id]) : route('dashboard.users.store'))
@section('create_title', isset($user) ? __('users.update.form') : __('users.create.form'))
@section('create_submit', isset($user) ? __('users.update') : __('users.create'))
@section('form_method', isset($user) ? 'PUT' : null)
@section('form_content')
    <div class="form-group form-group-m">
        <input type="text" class="form-control form-control-m" id="name" name="name" @formValue($user->name) placeholder="&nbsp;" autocomplete="off">
        <label for="name">{{__('name & family')}}</label>
    </div>

    <div class="form-group form-group-m">
        <input type="text" class="form-control form-control-m text-left direction-ltr" id="mobile" name="mobile" @formValue($user->mobile) placeholder="&nbsp;" autocomplete="off">
        <label for="mobile">{{__('mobile number')}}</label>
    </div>

    <div class="form-group form-group-m">
        <input type="text" class="form-control form-control-m text-left direction-ltr" id="username" name="username" @formValue($user->username) placeholder="&nbsp;" autocomplete="off">
        <label for="username">{{__('username')}}</label>
    </div>
     <div class="form-group form-group-m">
        <input type="text" class="form-control form-control-m text-left direction-ltr" id="email" name="email" @formValue($user->email) placeholder="&nbsp;" autocomplete="off">
        <label for="email">{{__('email')}}</label>
    </div>
    <div class="form-group form-group-m {{isset($user) && $user->type =='psychologist' ? 'd-none' : ''}}">
        <input type="text" class="form-control form-control-m" id="position" name="position" @if(!isset($user) || (isset($user) && $user->type !='psychologist'))@formValue($user->position) @endif placeholder="&nbsp;" autocomplete="off"  {{isset($user) && $user->type =='psychologist' ? 'disabled' : ''}}>
        <label for="position">{{__('position')}}</label>
    </div>
    <div class="form-group form-group-m {{isset($user) && $user->type !='psychologist' ? 'd-none' : ''}}">
        <select name="position" data-alias="position" id="psychologist-position" {{isset($user) && $user->type !='psychologist' ? 'disabled' : ''}} class="form-control form-control-m">
            <option value="supervisor" @selectChecked($user->position, 'supervisor')>{{__('supervisor')}}</option>
            <option value="therapist" @selectChecked($user->position, 'therapist')>{{__('therapist')}}</option>
            <option value="under_supervision" @selectChecked($user->position, 'under_supervision')>{{__('under_supervision')}}</option>
        </select>
        <label for="psychologist-position">{{__('position')}}</label>
    </div>

    <div class="form-group form-group-m">
        <input type="password" class="form-control form-control-m text-left direction-ltr" id="password" name="password"placeholder="&nbsp;" autocomplete="new-password">
        <label for="password">{{__('password')}}</label>
    </div>

    <div class="form-group mb-0">
        <label>{{__('status')}}</label>
        <div class="d-flex flex-wrap">
            <div class="richak richak-sm richak-secondary">
                <input type="radio" name="status" id="status-active" value="active" @radioChecked($user->status, 'active')>
                <label for="status-active">
                    <span class="far fa-lightbulb-on richak-icon"></span>
                    {{__('status.active')}}
                </label>
            </div>
            <div class="richak richak-sm richak-secondary">
                <input type="radio" name="status" id="status-awaiting" value="awaiting" @radioChecked($user->status, 'awaiting')>
                <label for="status-awaiting">
                    <i class="fal fa-user-clock richak-icon"></i>
                    {{__('status.awaiting')}}
                </label>
            </div>
            <div class="richak richak-sm richak-secondary">
                <input type="radio" name="status" id="status-blocked" value="blocked" @radioChecked($user->status, 'blocked')>
                <label for="status-blocked">
                    <i class="fal fa-user-lock richak-icon"></i>
                    {{__('status.blocked')}}
                </label>
            </div>
        </div>
    </div>

    <div class="form-group mb-0">
        <label>{{__('type')}}</label>
        <div class="d-flex flex-wrap user-types">
            <div class="richak richak-sm richak-secondary">
                <input type="radio" name="type" id="type-admin" value="admin" @radioChecked($user->type, 'admin')>
                <label for="type-admin">
                    <span class="far fa-users-crown richak-icon"></span>
                    {{__('type.admin')}}
                </label>
            </div>
            <div class="richak richak-sm richak-secondary">
                <input type="radio" name="type" id="type-manager" value="manager" @radioChecked($user->type, 'manager')>
                <label for="type-manager">
                    <i class="fal fa-users-cog richak-icon"></i>
                    {{__('type.manager')}}
                </label>
            </div>
            <div class="richak richak-sm richak-secondary">
                <input type="radio" name="type" id="type-operator" value="operator" @radioChecked($user->type, 'operator')>
                <label for="type-operator">
                    <i class="fal fa-user-headset richak-icon"></i>
                    {{__('type.operator')}}
                </label>
            </div>
            <div class="richak richak-sm richak-secondary">
                <input type="radio" name="type" id="type-psychologist" value="psychologist" @radioChecked($user->type, 'psychologist')>
                <label for="type-psychologist">
                    <i class="fal fa-user-tie richak-icon"></i>
                    {{__('type.psychologist')}}
                </label>
            </div>
            <div class="richak richak-sm richak-secondary">
                <input type="radio" name="type" id="type-client" value="client" @radioChecked($user->type, 'client')>
                <label for="type-client">
                    <i class="far fa-user-shield richak-icon"></i>
                    {{__('type.client')}}
                </label>
            </div>
        </div>
    </div>

    <div class="form-group mb-0">
        <label>{{__('gender')}}</label>
        <div class="d-flex flex-wrap">
            <div class="richak richak-sm richak-secondary">
                <input type="radio" name="gender" id="gender-male" value="male" @radioChecked($user->gender, 'male')>
                <label for="gender-male">
                    <span class="fal fa-male richak-icon"></span>
                    {{__('male')}}
                </label>
            </div>
            <div class="richak richak-sm richak-secondary">
                <input type="radio" name="gender" id="gender-female" value="female" @radioChecked($user->gender, 'female')>
                <label for="gender-female">
                    <span class="fal fa-female richak-icon"></span>
                    {{__('female')}}
                </label>
            </div>
        </div>
    </div>
@endsection
