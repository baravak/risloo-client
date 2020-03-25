@extends('dashboard.create')
@section('form_content')
    <div class="form-group form-group-m">
        <select class="select2-select form-control form-control-m" data-type="users" name="user_id" data-title="name id" id="user_id" data-url="{{route('dashboard.users.index')}}">
            <option value="">پرسشنامه 16 عاملی شخصیت کتل</option>
        </select>
        <label for="name">{{__('Assessment')}}</label>
    </div>
    @isset($assessment)
        <div class="form-group form-group-m">
        <input type="hidden" id="assessment_id" name="assessment_id" value="{{$assessment->id}}">
        <input type="text" class="form-control form-control-m" value="{{$assessment->title}}" disabled placeholder="&nbsp;" autocomplete="off">
        <label for="name">{{__('Assessment')}}</label>
    </div>
    @else
        <div class="form-group form-group-m">
            <select class="select2-select" name="assessment_id" id="assessment_id" data-url="{{route('dashboard.assessments.index')}}">
            </select>
        </div>
    @endisset
@endsection
