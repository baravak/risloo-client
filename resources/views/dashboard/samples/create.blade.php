@extends('dashboard.create')
@section('form_content')
    @isset($scale)
        <div class="form-group form-group-m">
        <input type="hidden" id="scale_id" name="scale_id" value="{{$scale->id}}">
        <input type="text" class="form-control form-control-m" value="{{$scale->title}}" disabled placeholder="&nbsp;" autocomplete="off">
        <label for="name">{{__('Scale')}}</label>
    </div>
    @else
        <div class="form-group form-group-m">
            <select class="select2-select form-control form-control-m" multiple name="scale_id" id="scale_id" data-url="{{route('dashboard.assessments.index')}}">
            </select>
            <label for="scale_id">{{__('Scale')}}</label>
        </div>
    @endisset

    @isset($client)
    <div class="d-flex align-items-center fs-12 d-inline-block">
        <input type="hidden" id="client_id" name="client_id" value="{{$client->id}}">
        <span class="media media-sm media-primary">
            @if ($client->avatar->get('tidy') || $client->avatar->get('small'))
                <img src="{{$client->avatar->get('tidy') ? $client->avatar_url->url('tidy') : $client->avatar_url->url('small')}}" alt="A">
            @else
                <span class="media-primary">IR</span>
            @endif
        </span>
        <div class="pr-1">
            <div class="font-weight-bold data-name">{{$client->name ?: __('Anonymouse')}}</div>
            <div class="fs-10 data-id">{{$client->id}}</div>
        </div>
    </div>
    @else
        <div class="form-group form-group-m">
        <select class="select2-select form-control form-control-m has-clear" multiple data-template="users" name="client_id" data-title="name id" id="client_id" data-url="{{route('dashboard.users.index', ['type' => 'client'])}}" data-placeholder="{{__('Without specified client')}}">
        </select>
        <label for="name">{{__('Client')}}</label>
    </div>
    @endisset


@endsection
