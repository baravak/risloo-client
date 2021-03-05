@extends($layouts->dashboard)

@section('content')
    <div class="flex justify-between items-center flex-wrap mb-4">
        @include('layouts.quick_search')
        @if (auth()->isAdmin())
            <a href="{{ route('dashboard.centers.create') }}" class="flex items-center justify-center flex-shrink-0 w-10 sm:w-auto h-9 sm:px-4 text-sm text-green-700 border border-green-700 rounded-full hover:bg-green-50 transition mr-4" title="{{ __('Create new center') }}">
                <i class="fal fa-plus sm:ml-2"></i>
                <span class="hidden sm:inline">{{ __('Create new center') }}</span>
            </a>
        @endif
    </div>
    @include('dashboard.centers.list')
@endsection
