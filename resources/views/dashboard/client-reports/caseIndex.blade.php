@extends($layouts->dashboard)

@section('content')
@if (isset($room) && $room->manager->user_id == auth()->id())
    @include('dashboard.client-reports.create')
@endif
<div>
    @foreach ($reports as $report)
        <div class="mx-auto w-1/2 {{ $loop->index % 2 == 0 ? 'bg-gray-50' : '' }} rounded p-4 mb-4 {{ !$loop->last ? 'mt-5' : '' }} border">
            <div class="flex border-b mb-2">
                <h1 class="flex-grow text-lg font-bold">
                        {{-- <a href="{{ route('dashboard.client-reports.show', $report->id) }}"> --}}
                            {{ $report->title }}
                        {{-- </a> --}}
                    </h1>
                <div class="flex text-xs">@time($report->reported_at, 'Y-m-d H:i')</div>
            </div>
            <div class="text-sm">
                {!! nl2br($report->content) !!}
            </div>
            <div class="mt-6 border-t">
                    <span class="text-xs font-bold">مراجعین</span>
                @foreach ($report->clients as $clients)
                    <span class="text-xs p-2 inline-block">{{ $clients->name}}</span>
                @endforeach
            </div>
            @if ($report->viewers->count() > 1)
                <div class="mt-2">
                    <span class="text-xs font-bold">خوانندگان</span>
                    @foreach ($report->viewers as $viewer)
                        <span class="text-xs p-2 inline-block">{{ $viewer->name}}</span>
                    @endforeach
            </div>
            @endif
            @if (isset($report->session))
            <div class="mt-2">
                <span class="text-xs font-bold">جلسه</span>
                <span class="text-xs p-2 inline-block">{{ $report->session->id}}</span>
                <span class="text-xs font-bold">پرونده</span>
                <span class="text-xs p-2 inline-block">{{ $report->session->case->id}}</span>
            </div>
            @elseif(isset($report->case))
            <div class="mt-2">
                <span class="text-xs font-bold">پرونده</span>
                <span class="text-xs p-2 inline-block">{{ $report->case->id}}</span>
            </div>
            @endif
        </div>
    @endforeach
</div>
{{ $reports->links() }}
@endsection

