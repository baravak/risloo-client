@extends('dashboard.create')
@section('form_action', isset($document) ? route('dashboard.documents.update', ['id' => $document->id]) : route('dashboard.documents.store'))
@section('create_title', isset($document) ? __('users.update.form') : __('users.create.form'))
@section('create_submit', isset($document) ? __('users.update') : __('users.create'))
@section('form_method', isset($document) ? 'PUT' : null)
@section('form_content')
    <div class="form-group form-group-m">
        <input type="text" class="form-control form-control-m" id="title" name="title" @formValue($document->title) placeholder="&nbsp;" autocomplete="off">
        <label for="name">{{__('Title')}}</label>
    </div>
@endsection
