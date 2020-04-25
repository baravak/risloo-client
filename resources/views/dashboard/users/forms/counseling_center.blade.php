@extends('dashboard.create')
@isset ($user)
    @section('before_content')
    <form action="{{route('dashboard.users.avatar.store', ['user' => $user->id])}}" method="POST">
        <div class="card-body">
            <div class="form-group d-flex">
                <div class="media media-xl rounded-circle">
                    <input type="file" class="hide-input input-avatar" id="avatar" name="avatar">
                    <label for="avatar" class="m-0">
                        <img src="{{$user->avatar_url->url('small')}}" alt="">
                    </label>
                </div>
            </div>
            <button type="submit" class="btn btn-primary fs-10" data-alias="avatar">
                {{__('Save avatar')}}
            </button>
        </div>
    </form>
    @endsection
@endisset

@section('form_content')
    <div class="form-group form-group-m">
        <input type="text" class="form-control form-control-m" id="name" name="name" @formValue($user->name) placeholder="&nbsp;" autocomplete="off">
        <label for="name">{{__('Registered name')}}</label>
    </div>

     <div class="form-group form-group-m">
        <input type="text" class="form-control form-control-m text-left direction-ltr" id="email" name="email" @formValue($user->email) placeholder="&nbsp;" autocomplete="off">
        <label for="email">{{__('Email')}}</label>
    </div>
    @can('update', $user->center)
    <div class="form-group form-group-m">
        <select class="select2-select form-control form-control-m" data-template="users" name="manager_id" data-title="name id" id="manager_id" data-url="{{route('dashboard.users.index', ['type' => ['psychologist', 'operator']])}}">
            <option value="{{$user->center->manager->id}}">{{$user->center->manager->name ?: $user->center->manager->id}}</option>
        </select>
        <label for="manager_id">{{__('Manager')}}</label>
    </div>
    @endcan
@endsection
