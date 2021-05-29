<div data-xhr="center-acceptation">
    @if ($center->acceptation)
        <div class="flex items-center text-xs mt-2">
            @if (!$center->acceptation->accepted_at)
                <span class="text-yellow-500">{{ __('Awaiting for acceptation') }}</span>
            @elseif($center->acceptation->kicked_at)
                <span class="text-red-500">{{ __('Kicked') }}</span>
            @elseif($center->acceptation->accepted_at)
                <span class="text-gray-500">{{ __('You are is :position of this cenetr', ['position' => __(ucfirst($center->acceptation->position))]) }}</span>
            @endif
        </div>
    @endif
</div>
