<div>
    <div class="flex justify-between items-center mb-4">
        <div class="flex items-center">
            <span class="w-8 border-t border-gray-200 inline-block ml-3"></span>
            <h3 class="font-bold text-gray-700 cursor-default">{{ __('My therapy centers') }}</h3>
            <span class="text-xs text-gray-600 font-light mr-2" data-xhr="total">({{ $user->centers->count() }})</span>
        </div>
        @if ($user->centers->count() > 5)
            <div>
                <a href="{{ route('dashboard.centers.index', ['my' => true]) }}" class="text-sm text-blue-700">{{ __('See All') }}</a>
            </div>
        @endif
    </div>

    <div data-xhr="center-items">
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            @foreach ($user->centers as $center)
                @include('dashboard.centers.listRaw')
            @endforeach
        </div>
    </div>
</div>
