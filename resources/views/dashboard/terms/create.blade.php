@extends('dashboard.create')
@section('form_action', isset($term) ? route('dashboard.terms.update', ['id' => $term->id]) : route('dashboard.terms.store'))
@section('create_title', isset($term) ? __('terms.update.form') : __('terms.create.form'))
@section('create_submit', isset($term) ? __('terms.update') : __('terms.create'))
@section('form_method', isset($term) ? 'PUT' : null)
@section('form_content')
    <div class="form-group form-group-m">
        <input type="text" class="form-control form-control-m" id="title" name="title" @formValue($term->title) placeholder="&nbsp;" autocomplete="off">
        <label for="name">{{__('Title')}}</label>
    </div>
@endsection
