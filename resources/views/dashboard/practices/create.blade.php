@extends('dashboard.create')
@section('form_content')
<div class="form-group form-group-m">
    <input type="text" class="form-control form-control-m" id="title" name="title" placeholder="&nbsp;" autocomplete="off" @formValue($practice->title)>
    <label for="title">{{__('Title')}}</label>
</div>

<div class="form-group form-group-m">
    <input type="text" class="form-control form-control-m" id="content" name="content" placeholder="&nbsp;" autocomplete="off" @formValue($practice->content)>
    <label for="content">{{__('Content')}}</label>
</div>

<div class="form-group form-group-m">
    <input type="file" class="form-control form-control-m" id="attachment" name="attachment" placeholder="&nbsp;" autocomplete="off">
    <label for="attachment">{{__('Attachment')}}</label>
</div>
@endsection
