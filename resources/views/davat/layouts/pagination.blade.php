@if ($paginator->hasPages())
    <nav class="flex justify-center items-center flex-wrap mt-4 text-sm font-medium">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            @if (false)
                <span class="flex justify-center items-center flex-shrink-0 h-7 ml-2 text-gray-300 cursor-default">{{ __('Previous') }}</span>
            @endif
        @else
            <a href="{{ $paginator->previousPageUrl() }}" class="flex justify-center items-center flex-shrink-0 h-7 ml-2 text-gray-700">{{ __('Previous') }}</a>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <span>{{ $element }}</span>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <span class="flex justify-center items-center flex-shrink-0 w-7 h-7 ml-2 bg-brand text-white rounded-full cursor-default">{{ $page }}</span>
                    @else
                        <a href="{{ $url }}" class="flex justify-center items-center flex-shrink-0 w-7 h-7 ml-2 text-gray-700 rounded-full hover:bg-gray-100 transition">{{ $page }}</a>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" class="flex justify-center items-center flex-shrink-0 h-7 text-gray-700">{{ __('Next') }}</a>
        @else
            @if (false)
                <span class="flex justify-center items-center flex-shrink-0 h-7 text-gray-300 cursor-default">{{ __('Next') }}</span>
            @endif
        @endif
    </nav>
@endif