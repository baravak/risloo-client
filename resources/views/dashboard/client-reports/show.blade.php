@extends($layouts->dashboard)
@section('content')
<div class="border border-gray-300 rounded mx-auto p-4 mt-8 w-full md:w-1/2 relative">
    @if (isset($room) && $room->manager->user_id == auth()->id())
        <a href="#" class="flex items-center justify-center text-xs text-gray-500 border border-gray-200 rounded-full absolute top-4 left-4 w-8 h-8 hover:bg-gray-50 transition" title="{{ __('Edit') }}" aria-label="{{ __('Edit') }}">
            <i class="fal fa-edit"></i>
        </a>
    @endif

    <div class="flex items-center">
        <i class="fal fa-file-alt text-xl ml-2 pb-1"></i>
        <span class="variable-font-medium text-gray-800">{{ $report->title }}</span>
    </div>

    <div class="text-sm text-gray-500 leading-normal mt-2">
        <span>{!! nl2br($report->content) !!}</span>
    </div>

    <div class="mt-4">
        @isset($report->clients)
        <h3 class="text-sm variable-font-medium text-gray-700">{{ __('Clients') }}</h3>
        @endisset
        <div class="bg-gray-100 p-4 rounded mt-2 grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 2xl:grid-cols-4 gap-4">
            @foreach ($report->clients as $clients)
                <div class="flex text-xs text-gray-500 cursor-default">
                    <i class="fal fa-user ml-2"></i>
                    <span>{{ $clients->name}}</span>
                </div>
            @endforeach
        </div>
    </div>

    @if ($report->viewers->count() > 1)
        <div class="mt-4">
            <h3 class="text-sm variable-font-medium text-gray-700">{{ __('CC to') }}</h3>
            <div class="bg-gray-100 p-4 rounded mt-2 grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 2xl:grid-cols-4 gap-4">
                @foreach ($report->viewers as $viewer)
                    <div class="flex text-xs text-gray-500 cursor-default">
                        <i class="fal fa-user ml-2"></i>
                        <span>{{ $viewer->name}}</span>
                    </div>
                @endforeach
            </div>
        </div>
    @endif

    @if (isset($report->session))
        <div class="flex items-center justify-between mt-4 text-xs text-gray-500 cursor-default">
            <div>
                <span>جلسه</span>
                <span class="inline-block dir-ltr">{{ $report->session->id }}</span>
            </div>
            <div>
                <span>پرونده</span>
                <span class="inline-block dir-ltr">{{ $report->session->case->id }}</span>
            </div>
        </div>
    @elseif(isset($report->case))
        <div class="flex items-center mt-4 text-xs text-gray-500 cursor-default">
            <div>
                <span>پرونده</span>
                <span class="inline-block dir-ltr">{{ $report->case->id }}</span>
            </div>
        </div>
    @endif

    <div class="flex items-center mt-4 text-xs text-gray-500 cursor-default">
        <div>
            <i class="fal fa-clock ml-1 pt-1"></i>
            <span>@time($report->reported_at, '%A %d %B %y ساعت H:i')</span>
        </div>
    </div>
</div>
@endsection