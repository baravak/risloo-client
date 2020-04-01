@extends('dashboard.create')
@section('form_content')
    <div class="form-group form-group-m">
        <select class="select2-select form-control form-control-m" multiple data-template="users" name="user_id[]" data-title="name id" id="user_id" data-url="{{route('dashboard.users.index')}}">
        </select>
        <label for="user_id">{{__('User')}}</label>
    </div>
    <div class="form-group form-group-m">
        <select type="text" class="form-control form-control-m" id="position" name="position">
            @foreach (['manager', 'psychologist', 'operator', 'supervisor', 'client'] as $item)
                <option value="{{$item}}">{{__(ucfirst($item))}}</option>
            @endforeach
        </select>
        <label for="position">{{__('Position')}}</label>
    </div>
@endsection
