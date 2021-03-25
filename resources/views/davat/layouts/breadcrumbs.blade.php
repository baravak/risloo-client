@if (count($breadcrumbs))
    @foreach ($breadcrumbs as $breadcrumb)
        @if ($breadcrumb->url && !$loop->last)
            <a href="{{ $breadcrumb->url }}" class="text-sm ml-2 text-gray-500 hover:text-gray-700 transition">{{ $breadcrumb->title }}</a>
            <span class="fal fa-angle-left ml-2 text-gray-500"></span>
        @elseif(!$loop->last)
            <span class="text-sm ml-2 text-gray-500 transition">{{ $breadcrumb->title }}</span>
            <span class="fal fa-angle-left ml-2 text-gray-500"></span>
        @else
            <span class="text-sm text-gray-700 font-semibold cursor-default">{{ $breadcrumb->title }}</span>
        @endif
    @endforeach
@endif
