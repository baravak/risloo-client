@extends('dashboard.create')
@section('form_content')

<div class="form-group form-group-m">
    <input type="text" class="form-control form-control-m direction-ltr" id="mobile" name="mobile" placeholder="&nbsp;" autocomplete="off">
    <label for="mobile">{{__('Mobile')}}</label>
</div>
@endsection
