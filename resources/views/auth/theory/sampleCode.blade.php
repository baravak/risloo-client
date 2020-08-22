@section('auth-form')
<div class="fs-14 mb-1 text-secondary">
    {{__("At the end of this step, your personal details will be visible to the managers of therapy centers and therapy rooms.")}}
</div>
<div class="form-group">
    <input type="password" class="form-control" id="code" name="code" placeholder="{{__('Sample code')}}">
</div>
<button class="btn btn-dark btn-block btn-login mb-3">{{__('Enter the sample')}}</button>
@endsection
@extends('auth.theory')
