@extends('dashboard.create')
@section('form_content')
<div class="form-group form-group-m">
    <input type="text" class="form-control form-control-m" id="title" name="title" placeholder="&nbsp;" autocomplete="off" @formValue($document->title)>
    <label for="title">{{__('Title')}}</label>
</div>
<div class="form-group form-group-m">
    <input type="file" class="form-control form-control-m" id="attachment" name="attachment" placeholder="&nbsp;" autocomplete="off">
    <label for="attachment">{{__('Attachment')}}</label>
</div>

<div class="form-group form-group-m">
    <input type="text" class="form-control form-control-m" id="description" name="description" placeholder="&nbsp;" autocomplete="off" @formValue($document->description)>
    <label for="description">{{__('Description')}}</label>
</div>

@endsection
