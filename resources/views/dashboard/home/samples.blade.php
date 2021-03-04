<div class="mt-8">
    <div class="flex justify-between items-center mb-4">
        <div class="flex items-center">
            <span class="w-8 border-t border-gray-200 inline-block ml-3"></span>
            <h3 class="font-bold text-gray-700 cursor-default">{{ __('My open samples') }}</h3>
            <span class="text-xs text-gray-600 font-light mr-2" data-xhr="total">({{ $user->samples ? $user->samples->count() : 0 }})</span>
        </div>
        @if ($user->samples && $user->samples->count() > 5)
            <div>
                <a href="{{ route('dashboard.samples.index') }}" class="text-sm text-blue-700">{{ __('See all my samples') }}</a>
            </div>
        @endif
    </div>

    <div>
        @include('dashboard.samples.list', ['samples' => ($user->samples ?: [])])
    </div>
</div>
