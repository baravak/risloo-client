@extends('dashboard.create')
@section('form_content')
    <div class="form-group form-group-m">
        <input type="text" class="form-control form-control-m" id="title" name="title" @formValue($document->title) placeholder="&nbsp;" autocomplete="off">
        <label for="name">{{__('Title')}}</label>
    </div>
@endsection
