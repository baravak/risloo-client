@extends('dashboard.create')
@section('form_content')
    <div class="form-group form-group-m">
        <select class="select2-select form-control form-control-m" data-template="users" name="owner_id" data-title="name id" id="owner_id" data-url="{{route('dashboard.users.index', ['type' => ['psychologist', 'counseling_center']])}}">
        </select>
        <label for="owner_id">{{__('Owner')}}</label>
    </div>
    <div class="form-group form-group-m">
        <select class="select2-select form-control form-control-m" data-template="users" name="manager_id" data-title="name id" id="manager_id" data-url="{{route('dashboard.users.index', ['type' => ['psychologist', 'operator']])}}">
        </select>
        <label for="manager_id">{{__('Manager')}}</label>
    </div>
    <div class="form-group form-group-m">
        <select type="text" class="form-control form-control-m" id="type" name="type">
            @foreach (['psychotherapy', 'group_psychotherapy', 'academy', 'workshop'] as $item)
                <option value="{{$item}}">{{__(ucfirst($item))}}</option>
            @endforeach
        </select>
        <label for="type">{{__('Type')}}</label>
    </div>
@endsection
