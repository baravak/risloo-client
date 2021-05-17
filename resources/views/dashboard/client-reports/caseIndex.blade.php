@extends($layouts->dashboard)
@section('content')

<div class="flex items-center justify-between mb-4 mt-8">
    <h2 class="heading" data-total="(135{{-- {{ $users->total() }} --}})" data-xhr="total">{{ __('Reports') }}</h2>
    @if (isset($room) && $room->manager->user_id == auth()->id())
        <a href="#{{--{{ route('dashboard.client-reports.create') }}--}}" class="flex items-center justify-center flex-shrink-0 w-9 sm:w-auto h-9 sm:px-4 text-sm text-green-700 border border-green-700 rounded-full hover:bg-green-50 transition focus-current ring-green-700 mr-4" title="{{ __('Create new report') }}" aria-label="title="{{ __('Create new report') }}">
            <i class="fal fa-plus sm:ml-2"></i>
            <span class="hidden sm:inline">{{ __('Create new report') }}</span>
        </a>
    @endif
</div>
<div data-xhr="user-items">
    <div class="overflow-x-auto">
        <div class="align-middle inline-block min-w-full">
            <div class="overflow-hidden border border-gray-200 rounded">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-100 cursor-default">
                        <tr>
                            <th class="px-3 py-2 text-right text-xs variable-font-medium text-gray-500" scope="col">{{ __('Title') }}</th>
                            <th class="px-3 py-2 text-right text-xs variable-font-medium text-gray-500" scope="col">{{ __('Time') }}</th>
                            <th class="px-3 py-2 text-right text-xs variable-font-medium text-gray-500" scope="col">{{ __('Clients') }}</th>
                            <th class="px-3 py-2 text-right text-xs variable-font-medium text-gray-500" scope="col">{{ __('CC to') }}</th>
                            <th class="px-3 py-2" scope="col"></th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach ($reports as $report)
                            <tr class="transition hover:bg-gray-50">
                                <td class="p-3 whitespace-nowrap">
                                    <div class="flex items-center cursor-default">
                                        <span class="text-xs text-gray-600">{{ $report->title }}</span>
                                    </div>
                                </td>
                                <td class="p-3 whitespace-nowrap">
                                    <div class="flex items-center cursor-default">
                                        <span class="text-xs text-gray-600">@time($report->reported_at, 'Y-m-d H:i')</span>
                                    </div>
                                </td>
                                <td class="p-3 whitespace-nowrap">
                                    <div class="flex flex-col cursor-default">
                                        @foreach ($report->clients as $clients)
                                            <span class="text-xs text-gray-600 {{ !$loop->last ? 'mb-1' : '' }}">{{ $clients->name}}</span>
                                        @endforeach
                                    </div>
                                </td>
                                <td class="p-3 whitespace-nowrap">
                                    <div class="flex flex-col cursor-default">
                                        @if ($report->viewers->count() > 1)
                                            @foreach ($report->viewers as $viewer)
                                                <span class="text-xs text-gray-600 {{ !$loop->last ? 'mb-1' : '' }}">{{ $viewer->name}}</span>
                                            @endforeach
                                        @endif
                                    </div>
                                </td>
                                <td class="px-3 py-2 whitespace-nowrap text-left dir-ltr">
                                    <div class="inline-block mr-4">
                                        {{-- <x-link-show :link="$report->route('show')"/> --}}
                                        <a href="#"><i class="fal fa-eye text-sm text-gray-600 hover:text-blue-600 relative top-0.5"></i></a>
                                    </div>
                                    <div class="inline-block">
                                        <a href="#" title="{{ __('Edit') }}" aria-label="{{ __('Edit') }}"><i class="fal fa-edit text-sm leading-relaxed text-gray-600 hover:text-blue-600"></i></a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{ $reports->links() }}
</div>
{{-- <div>
    @foreach ($reports as $report)
        <div class="mx-auto w-1/2 {{ $loop->index % 2 == 0 ? 'bg-gray-50' : '' }} rounded p-4 mb-4 {{ !$loop->last ? 'mt-5' : '' }} border">
            <div class="flex border-b mb-2">
                <h1 class="flex-grow text-lg font-bold">
                        <a href="{{ route('dashboard.client-reports.show', $report->id) }}">
                            {{ $report->title }}
                        </a>
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
{{ $reports->links() }} --}}
@endsection