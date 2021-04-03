@extends($layouts->dashboard)

@section('content')
    <div>
        <div class="mb-4 mt-8">
            <h2 class="heading" data-total="({{ $users->total() }})" data-xhr="total">{{ __('Users') }}</h2>
        </div>

        <div class="flex items-center mb-4">
            @include('layouts.quick_search')
            <a href="{{ route('dashboard.users.create') }}" class="flex items-center justify-center flex-shrink-0 w-9 sm:w-auto h-9 sm:px-4 text-sm text-green-700 border border-green-700 rounded-full hover:bg-green-50 transition focus-current ring-green-700 mr-4" title="{{ __('Create new user') }}" aria-label="title="{{ __('Create new user') }}">
                <i class="fal fa-plus sm:ml-2"></i>
                <span class="hidden sm:inline">{{ __('Create new user') }}</span>
            </a>
        </div>
        @include('dashboard.users.list')
    </div>
@endsection