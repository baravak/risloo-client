@extends('dashboard.create')
@section('form-title')
    {{__('Join new user')}}
@endsection
@section('form_content')

<div class="form-group form-group-m">
    <input type="text" class="form-control form-control-m direction-ltr" id="mobile" name="mobile" placeholder="&nbsp;" autocomplete="off">
    <label for="mobile">{{__('Mobile')}}</label>
</div>
@if ((auth()->isAdmin() || $center->acceptation->position == 'manager') && $center->type == 'counseling_center')
    <div class="form-group form-group-m">
        <select class="form-control form-control-m" name="position" id="position">
            <option value="manager">{{__('Manager')}}</option>
            <option value="operator">{{__('Operator')}}</option>
            <option value="psychologist">{{__('Psychologist')}}</option>
            <option value="client">{{__('Client')}}</option>
        </select>
        <label for="position">{{__('Position')}}</label>
    </div>
@endif
@endsection
