@php
$score = [
    rand(12, 12*5),
    rand(10, 10*5),
    rand(23, 23*5),
];
$total = array_sum($score);
$pattern = [
    [12, 12*5], [10, 10*5], [23, 23*5]
];
$report = rand(0, 2);
$report_text =['احساس گناه کم', "احساس گناه متوسط", "احساس گناه زیاد"];
$item_text =['معیارهای اخلاقی', "حالت گناه", "خصیصه گناه"];
@endphp
<?xml version="1.0" encoding="utf-8"?>
<svg version="1.1"  xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 1006 1446" xml:space="preserve">
    <style>
        @font-face {
            font-family: 'dana';
            src: url('../../public/fonts/Dana/woff/dana-fanum-regular.woff') format('woff'); font-display: fallback;
        }
        * {cursor: default;}
    </style>
    <defs>
        <radialGradient  id="radGrad">
            <stop offset="0%" stop-color="rgba(1, 123, 164, 1)" stop-opacity="1" />
            <stop offset="40%" stop-color="rgba(1, 123, 164, .5)" stop-opacity="1" />
            <stop offset="100%" stop-color="rgba(255, 255, 255, .1)" stop-opacity="0" />
        </radialGradient>
    </defs>
    <rect width="1006" height="1446" fill="white" />
    <circle cx="502" cy="502" r="{{($total * 501) / 225}}" stroke="none" fill="url(#radGrad)" />

    <rect x="{{2 + ($report * 333.5)}}" y="1004" width="334" height="100" fill="#007ba4" rx="15" />
    <g font-family="dana" dominant-baseline="middle" text-anchor="middle" font-size="32px">
        <text x="502" y="502" font-size="80px">{{$total}}</text>
        @foreach ($report_text as $text)
            <text x="{{2 + 167 + (334 * $loop->index)}}" y="1054">{{$text}}</text>
        @endforeach
    </g>

    <rect width="1002" height="334" x="2" y="1104" fill="none" />
    <line x1="336" y1="1104" x2="336" y2="1438" />
    <line x1="668" y1="1104" x2="668" y2="1438" />
    @foreach ($score as $item)
        <circle cx="{{2 + 167 + (334 * $loop->index)}}" cy="1273" r="{{($item * 167) / $pattern[$loop->index][1]}}" stroke="none" fill="url(#radGrad)" />
        <text x="{{2 + 167 + (334 * $loop->index)}}" y="1273" font-family="dana" dominant-baseline="middle" text-anchor="middle" font-size="38px">{{$total}}</text>
    @endforeach

    @foreach ($item_text as $text)
        <text x="{{2 + 167 + (334 * $loop->index)}}" y="1410" font-family="dana" dominant-baseline="middle" text-anchor="middle" font-size="28px">{{$text}}</text>
    @endforeach
</svg>