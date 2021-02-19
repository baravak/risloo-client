@extends($layouts->dashboard)

@section('content')
    <div>
        <div class="mb-4 mt-8">
            <h3 class="flex items-center font-bold text-gray-700 cursor-default">
                <span class="w-8 border-t border-gray-200 inline-block ml-3"></span>
                <span>{{ __('Documents') }}</span>
                <span class="text-xs text-gray-600 font-light mr-2" data-xhr="total">({{ $documents->total() }})</span>
            </h3>
        </div>

        <div class="flex justify-between items-center flex-wrap mb-4">
            @include('layouts.quick_search')
            <a href="{{ route('dashboard.documents.create') }}" class="flex items-center justify-center flex-shrink-0 w-10 sm:w-auto h-9 sm:px-4 text-sm text-green-700 border border-green-700 rounded-full hover:bg-green-50 transition mr-4" title="{{ __('Create new document') }}">
                <i class="fal fa-plus sm:ml-2"></i>
                <span class="hidden sm:inline">{{ __('Create new document') }}</span>
            </a>
        </div>
        
        @include($documents->count() ? 'dashboard.documents.list' : 'dashboard.documents.emptyDocuments')

        {{$documents->links()}}
    </div>
@endsection
