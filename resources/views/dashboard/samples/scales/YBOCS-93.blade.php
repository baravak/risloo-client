@php
    $_aProfiles = [
        ['مرتب‌شده با شماره سوال', 'profile_items_sort_key_png'],
        ['مرتب‌شده با پاسخ‌ها', 'profile_items_sort_value_png'],
];
@endphp
<div data-xhr="sample-profiles" id="sample-profile">
    <div class="mt-4">
        <h3 class="heading">پاسخ‌ها</h3>
        <div class="mt-4">
            @foreach ($_aProfiles as $item)
                @if ($scoring->profiles && $scoring->profiles->where('mode', $item[1])->first())
                    <a href="{{ $scoring->profiles->where('mode', $item[1])->first()->url }}" target="_blank" class="inline-block magnific-popup mr-4">
                         {{ $item[0] }}
                        <img src="{{ $scoring->profiles->where('mode', $item[1])->first()->url }}" class="w-32 h-32 object-cover border border-gray-200 p-1 rounded">
                    </a>
                @endif
            @endforeach
        </div>
    </div>
</div>
