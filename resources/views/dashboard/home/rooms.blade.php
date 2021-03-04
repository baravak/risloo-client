<div class="flex justify-between items-center mt-8 mb-4">
    <h3 class="heading" data-total="({{ $user->rooms ? $user->rooms->count() : 0 }})" data-xhr="total">{{ __('My therapy rooms') }}</h3>
    @if ($user->rooms && $user->rooms->count() > 5)
        <div>
            <a href="{{ route('dashboard.rooms.index') }}" class="text-sm text-blue-700">{{ __('See All') }}</a>
        </div>
    @endif
</div>

@if ($user->rooms && $user->rooms->count() > 0)
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-2 xl:grid-cols-3 2xl:grid-cols-4 gap-4">
        @foreach ($user->rooms ?: [] as $room)
            <a href="{{ $room->route('show') }}" class="border border-gray-200 rounded hover:bg-gray-50 transition">
                <div class="h-16 bg-gray-100 border-b border-gray-200"></div>

                <div class="flex justify-center items-center flex-shrink-0 w-20 h-20 mx-auto -mt-10 bg-gray-300 text-gray-600 rounded-full border-4 border-white overflow-hidden">
                    @avatarOrName($room->manager)
                </div>

                <div class="p-4">
                    <div class="text-sm sm:text-base text-center text-gray-700 font-medium">
                        {{ $room->manager->name }}
                    </div>
                    <div class="text-xs text-center text-gray-700 mt-2">
                        @if ($room->center->type == 'personal_clinic')
                            @lang('Personal clinic')
                        @else
                            {{ $room->center->detail->title }}
                        @endif
                    </div>
                </div>
            </a>
        @endforeach
    </div>
@endif