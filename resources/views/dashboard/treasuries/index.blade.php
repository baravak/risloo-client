@extends($layouts->dashboard)
@section('content')
    <div>
        <div class="mt-8 mb-4">
            <h3 class="heading" data-total="({{ $treasuries ? $treasuries->count() : 0 }})" data-xhr="total">{{ __('Financial treasuries') }}</h3>
        </div>

        <div class="flex items-center justify-between mb-4">
            <div></div>
            <a href="{{ route('dashboard.treasuries.create') }}" class="flex items-center justify-center flex-shrink-0 w-9 sm:w-auto h-9 sm:px-4 text-sm text-green-700 border border-green-700 rounded-full hover:bg-green-50 transition focus-current ring-green-700 mr-4" title="@lang('Create new Treasury')" aria-label="title="@lang('Create new Treasury')">
                <i class="fal fa-plus sm:ml-2"></i>
                <span>@lang('Create new Treasury')</span>
            </a>
        </div>
        @include('dashboard.treasuries.list')
    </div>
@endsection
