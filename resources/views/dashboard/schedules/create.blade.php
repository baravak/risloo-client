@section('form_action'){{ route('dashboard.room.schedules.store',$room->id) }}@endsection
@extends('dashboard.create')
@section('form_content')
<div class="mt-4">
    <ul data-tabs>
        <li><a data-tabby-default href="#time-tab" class="focus direct" role="presentation">@lang('Time') </a></li>
        <li><a href="#clients-tab" class="focus direct" role="presentation">@lang('Clients')</a></li>
        <li><a href="#session-tab" class="focus direct" role="presentation">@lang('Session')</a></li>
        {{-- <li><a href="#payment-tab" class="focus direct" role="presentation">@lang('Payment')</a></li> --}}
    </ul>
</div>
<div id="time-tab">
    @include('dashboard.schedules.create.time')
</div>

<div id="clients-tab">
    @isset($case)
        @include('dashboard.schedules.create.client-create')
    @else
        @include('dashboard.schedules.create.client')
    @endisset
</div>

<div id="session-tab">
    @include('dashboard.schedules.create.session')
</div>

{{-- <div id="payment-tab">
    @include('dashboard.schedules.create.payment')
</div> --}}
@endsection
