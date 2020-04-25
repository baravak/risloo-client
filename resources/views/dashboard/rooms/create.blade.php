@extends('dashboard.create')
@section('form_content')

    <div class="form-group form-group-m">
        <select class="select2-select form-control form-control-m" name="counseling_center_id" data-title="owner.name" id="counseling_center_id" data-url="{{route('dashboard.centers.index', ['my' => 1, 'type' => 'counseling_center'])}}" data-placeholder="{{__('Select therapy center')}}">
        </select>
        <label for="counseling_center_id">{{__('Therapy center')}}</label>
    </div>
    <div class="form-group form-group-m">
        <select class="select2-select form-control form-control-m" data-template="users" name="psychologist_id" data-avatar="user.avatar.tiny.url user.avatar.small.url" data-id="user.id" data-title="user.name" id="psychologist_id" data-url-pattern="{{route('dashboard.relationship.users.index', ['relationship' => '%%', 'type' => 'psychologist'])}}" data-placeholder="{{__('Select psychologist')}}">
        </select>
        <label for="psychologist_id">{{__('Psychologist')}}</label>
    </div>
@endsection
