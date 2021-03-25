@if ($user->centers && $user->centers->count() > 0)
    <div class="flex justify-between items-center mt-8 mb-4">
        <h2 class="heading" data-total="({{ $user->centers ? $user->centers->count() : 0 }})" data-xhr="total">{{ __('My therapy centers') }}</h2>
        @if ($user->centers && $user->centers->count() > 5)
            <div>
                <a href="{{ route('dashboard.centers.index', ['my' => true]) }}" class="text-sm text-blue-700">{{ __('See All') }}</a>
            </div>
        @endif
    </div>

    <div data-xhr="center-items">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-4 2xl:grid-cols-5 gap-4">
            @foreach ($user->centers ?: [] as $center)
                @include('dashboard.centers.listRaw')
            @endforeach
        </div>
    </div>
@endif