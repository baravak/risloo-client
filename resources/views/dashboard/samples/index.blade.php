@extends($layouts->dashboard)

@section('content')
    <div>
        <div class="mt-8 mb-4">
            <h3 class="heading" data-total="({{$samples ? $samples->total() : 0 }})" data-xhr="total">{{ __('Samples') }}</h3>
        </div>

        <div class="flex justify-between items-center flex-wrap mb-4">
            @if ($samples->count())
                @include('layouts.quick_search')
            @endif
            @can('create', App\Sample::class)
                <a href="{{ route('dashboard.samples.create') }}" class="flex items-center justify-center flex-shrink-0 w-9 sm:w-auto h-9 sm:px-4 text-sm text-white border bg-green-700 hover:bg-green-900 rounded-full transition mr-4 focus-current ring-green-700" title="{{ __('Create sampel') }}">
                    <i class="fal fa-plus sm:ml-2"></i>
                    <span class="hidden sm:inline">{{ __('Create sampel') }}</span>
                </a>
            @endcan
        </div>
        @include('dashboard.samples.list')
    </div>
@endsection
