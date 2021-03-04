<div class="mt-8">
    <div class="flex justify-between items-center mb-4">
        <div class="flex items-center">
            <span class="w-8 border-t border-gray-200 inline-block ml-3"></span>
            <h3 class="font-bold text-gray-700 cursor-default">{{ __('My cases') }}</h3>
            <span class="text-xs text-gray-600 font-light mr-2" data-xhr="total">({{ $user->cases ? $user->cases->count() : 0 }})</span>
        </div>
        @if ($user->cases && $user->cases->count() > 5)
            <div>
                <a href="{{ route('dashboard.cases.index') }}" class="text-sm text-blue-700">{{ __('See All') }}</a>
            </div>
        @endif
    </div>

    <div>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-4 2xl:grid-cols-5 gap-4">
            @foreach ($user->cases ?: [] as $case)
                @include('dashboard.cases.item')
            @endforeach
        </div>
    </div>
</div>
