<div class="mb-4 mt-8">
    <h3 class="heading" data-total="( {{ $bulkSample->members_count }} / {{ $bulkSample->joined }} )" data-xhr="total">{{ __('Users') }}</h3>
</div>
@if ($bulkSample->members)
<div class="border border-gray-300 rounded p-4">
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-6 gap-4">
        @foreach ($bulkSample->members as $member)
        <div class="flex">
            <a href="{{ route('dashboard.center.users.show', ['center' => $center->id, 'user' => $member->id]) }}" class="inline-flex items-center text-gray-600 hover:text-brand">
                <i class="fal fa-user text-sm eading-normal ml-2"></i>
                <span class="text-xs">{{ $member->name }}</span>
            </a>
        </div>
        @endforeach
    </div>
</div>
@endif
