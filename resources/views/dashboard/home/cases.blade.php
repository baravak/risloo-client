@if ($user->cases && $user->cases->count() > 0)
    <div class="flex justify-between items-center mt-8 mb-4">
        <h3 class="heading" data-total="({{ $user->cases ? $user->cases->count() : 0 }})" data-xhr="total">{{ __('My cases') }}</h3>
        @if ($user->cases && $user->cases->count() > 5)
            <div>
                <a href="{{ route('dashboard.cases.index') }}" class="text-sm text-blue-700">{{ __('See All') }}</a>
            </div>
        @endif
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-2 xl:grid-cols-3 2xl:grid-cols-4 gap-4">
        @foreach ($user->cases ?: [] as $case)
            @include('dashboard.cases.item')
        @endforeach
    </div>
@endif