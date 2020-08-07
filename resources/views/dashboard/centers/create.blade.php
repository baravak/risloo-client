@extends('dashboard.create')
@section('form_content')
<div class="form-group mb-0 {{isset($center) && !auth()->isAdmin() ? 'd-none' : ''}}">
    <label>{{__('Clinic type')}}</label>
    <div class="d-flex flex-wrap">
        <div class="richak richak-sm richak-secondary">
            <input type="radio" name="type" id="type-personal_clinic" value="personal_clinic" checked @radioChecked($center->type, 'personal_clinic') {!!isset($center) ? 'disabled' : ''!!}>
            <label for="type-personal_clinic">
                <span class="far fa-user-alt richak-icon"></span>
                {{__('Personal')}}
            </label>
        </div>
        <div class="richak richak-sm richak-secondary">
            <input type="radio" name="type" id="type-counseling_center" value="counseling_center" @radioChecked($center->type, 'counseling_center') {!!isset($center) ? 'disabled' : ''!!}>
            <label for="type-counseling_center">
                <i class="fal fa-building richak-icon"></i>
                {{__('Counseling center')}}
            </label>
        </div>
    </div>
</div>
@if (auth()->isAdmin())
    <div class="form-group form-group-m">
        <select class="select2-select form-control form-control-m" data-template="users" data-id="id" name="manager_id" data-title="name" data-avatar="avatar.small.url" id="manager_id" data-url="{{route('dashboard.users.index', isset($center) ? ['personal_clinic' => $center->type == 'counseling_center' ? 'yes' : 'no'] : null)}}" {!!isset($center) && $center->type =='personal_clinic' ? 'disabled' : ''!!}>
            @isset($center)
                <option value="{{$center->manager->id}}" data-json="{{$center->manager}}" selected>{{$center->manager->name}}</option>
            @endisset
        </select>
        <label for="manager_id" data-alias="manager_id">{{__('Manager')}}</label>
    </div>
@endif
<div class="form-group form-group-m">
    <input type="text" class="form-control form-control-m" id="title" name="title" placeholder="&nbsp;" autocomplete="off" @formValue($center->detail->title)>
    <label for="title">{{__('Title')}}</label>
</div>

<div class="form-group form-group-m">
    <input type="file" class="form-control form-control-m" id="avatar" name="avatar" placeholder="&nbsp;" autocomplete="off">
    <label for="avatar">{{__('Avatar')}} <span class="text-info">({{__('Optional')}})</span></label>
</div>
<div class="form-group mb-0 mr-5 {{isset($center) && $center->type != 'personal_clinic' ? 'd-none' : ''}}">
    <div class="richak richak-xs richak-secondary richak-checkbox">
        <input type="checkbox" id="user-avatar">
        <label for="user-avatar">
            <span class="richak-icon"></span>
            <span>
                {{__('Use the default user avatar')}}
            </span>
        </label>
    </div>
</div>
<div class="form-group form-group-m">
    <input type="text" class="form-control form-control-m" id="description" name="description" placeholder="&nbsp;" autocomplete="off" @formValue($center->detail->description)>
    <label for="description">{{__('Description')}} <span class="text-info">({{__('Optional')}})</span></label>
</div>
<div class="form-group form-group-m">
    <input type="text" class="form-control form-control-m" id="address" name="address" placeholder="&nbsp;" autocomplete="off" @formValue($center->detail->address)>
    <label for="address">{{__('Address')}} <span class="text-info">({{__('Optional')}})</span></label>
</div>
<div class="form-group form-group-m">
    <select class="select2-select form-control form-control-m tag-type direction-ltr" multiple name="phone_numbers[]" id="phone_numbers">
        @isset($center)
        @foreach ($center->detail->phone_numbers ?: [] as $number)
            <option value="{{$number}}" selected>{{$number}}</option>
        @endforeach
        @endisset
    </select>
    <label for="phone_numbers">{{__('Phone numbers')}} <span class="text-info">({{__('Optional')}})</span></label>
</div>
@endsection
