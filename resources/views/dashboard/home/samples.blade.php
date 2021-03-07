@if ($user->samples && $user->samples->count() > 0)
    <div class="flex justify-between items-center mt-8 mb-4">
        <h3 class="heading" data-total="({{ $user->samples ? $user->samples->count() : 0 }})" data-xhr="total">{{ __('My open samples') }}</h3>
        @if ($user->samples && $user->samples->count() > 5)
            <div>
                <a href="{{ route('dashboard.samples.index') }}" class="text-sm text-blue-700">{{ __('See all my samples') }}</a>
            </div>
        @endif
    </div>

    @include('dashboard.samples.list', ['samples' => ($user->samples ?: [])])
@endif