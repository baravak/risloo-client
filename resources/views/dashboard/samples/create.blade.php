@extends('dashboard.create')
@section('form_content')
    <div class="form-group form-group-m">
        <select class="select2-select" name="user_id" id="user_id" data-url="{{route('dashboard.users.index')}}">
        </select>
        <div data-template="user_id">
            <span>
                <img src="${avatar.small.url}" alt="Avatar" class="profile rounded-circle" width="16" height="16"> ${name} - ${id}
            </span>
        </div>
    </div>
    @isset($assessment)
        <div class="form-group form-group-m">
        <input type="hidden" id="assessment_id" name="assessment_id" value="{{$assessment->id}}">
        <input type="text" class="form-control form-control-m" value="{{$assessment->title}}" disabled placeholder="&nbsp;" autocomplete="off">
        <label for="name">{{__('Assessment')}}</label>
    </div>
    @else
        <div class="form-group form-group-m">
            <select class="select2-select" name="assessment_id" id="assessment_id" data-url="{{route('dashboard.terms.index')}}">
            </select>
        </div>
    @endisset
@endsection
