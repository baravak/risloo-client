<div class="absolute top-3 left-3 flex" data-xhr="center-button">

@can('viewAny', [App\CenterUser::class, $center])
<a href="{{ route('dashboard.center.users.index', $center->id) }}" title="{{ __('Users') }}" class="flex justify-center items-center flex-shrink-0 text-brand border border-brand hover:bg-blue-50 w-9 h-9 rounded-full transition">
    <i class="fal fa-users"></i>
</a>
@endcan
<a href="{{ route('dashboard.center.schedules.index', $center->id) }}" class="flex justify-center items-center flex-shrink-0 border border-brand text-brand hover:bg-blue-50 px-4 h-9 rounded-full text-sm leading-normal transition mr-2">
    <span class="font-medium">{{ __('Therapy Schedules') }}</span>
</a>
@if (auth()->center($center->id))
<a href="{{ route('dashboard.center.users.show', ['center' => $center->id, 'user' => $center->acceptation->id]) }}" class="flex justify-center items-center flex-shrink-0 border border-brand text-brand hover:bg-blue-50 px-4 h-9 rounded-full text-sm leading-normal transition mr-2">
    <span class="font-medium">{{ __('My profile') }}</span>
</a>
@endif

@can('update', $center)
<a href="{{ $center->route('edit') }}" class="flex justify-center items-center flex-shrink-0 border border-gray-500 text-gray-600 hover:bg-gray-100 px-4 h-9 rounded-full text-sm leading-normal transition mr-2">
    <span class="font-medium">{{ __('Edit') }}</span>
</a>
@endcan

@can('acceptation', $center)
<a href="{{route('dashboard.centers.request', $center->id)}}" data-lijax="click" data-method="POST" class="flex justify-center items-center flex-shrink-0 text-white bg-green-600 hover:bg-green-700 w-auto px-8 h-9 rounded-full text-sm leading-normal transition mr-2 spinner">
    <span class="font-medium">{{ __('Acceptation request') }}</span>
</a>
@elseif ($center->acceptation)
    @if(!$center->acceptation->accepted_at && !$center->acceptation->kicked_at)
        <span class="text-sm text-yellow-500 flex justify-center items-center px-4 h-9 rounded-full">{{ __('Awaiting for acceptation') }}</span>
    @elseif($center->acceptation->accepted_at && $center->acceptation->kicked_at)
        <span class="text-xs text-red-500 flex justify-center items-center px-4 h-9 rounded-full">{{ __('Kicked') }}</span>
    @elseif($center->acceptation->accepted_at && !$center->acceptation->kicked_at)
        <span class="text-xs text-gray-500 flex justify-center items-center px-4 h-9 rounded-full">{{ __('You are is :position of this cenetr', ['position' => __(ucfirst($center->acceptation->position))]) }}</span>
    @endif
@endcan
</div>
