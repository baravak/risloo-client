<div data-xhr="center-acceptation-button">
    @can('acceptation', $center)
    <a href="{{route('dashboard.centers.request', $center->id)}}" data-lijax="click" data-method="POST" class="flex justify-center items-center flex-shrink-0 text-white bg-green-600 hover:bg-green-700 w-auto px-4 sm:px-8 h-9 rounded-full text-xs sm:text-sm transition mr-2 spinner">
        <span class="font-medium">{{ __('Acceptation request') }}</span>
    </a>
    @endcan
</div>
