<div class="page" id="first-page">
    <h1>ریسلو</h1>
    <p>شرکت راه‌کارهای نوین روان‌شناسی</p>
    <hr>
    <div style="float: right">
        <h2>نیم‌رخ نمونه {{$sample->scale->title}} <sup><small>{{$sample->version}}</small></sup></h2>
        <h5>
            {{$sample->owner->name}}
        </h5>
        <h6>
            <small>
                @if ($sample->room->owner->id == $sample->owner->id)
                    {{__('Personal clinic')}}
                @else
                    {{$sample->room->owner->name}}
                @endif
            </small>
        </h6>
    </div>
    <div style="float: left">
        <a href="https://r1l.ir/{{$sample->id}}">{!! QrCode::color(60, 110, 130)->generate('https://r1l.ir/' . $sample->id); !!}</a>
    </div>
    <div style="clear: both"></div>
    <hr>
    <table>
        <tr>
            <td>نام و نام خانوادگی</td>
            <th>
                @displayName($sample->client)
            </th>
        </tr>
        @foreach ($sample->prerequisite as $item)
            <tr>
                <td>{{$item->text}}</td>
                <th>
                    @isset($item->user_answered)
                        {{in_array($item->answer->type, ['option', 'select']) ? $item->answer->options[$item->user_answered - 1] : $item->user_answered}}
                    @endisset
                </th>
            </tr>
        @endforeach
        <tr>
            <td>ساخت نمونه</td>
            <td class="ltr">{{$sample->created_at ? \Morilog\Jalali\Jalalian::forge($sample->created_at->timestamp)->format('Y/m/d 🕑 H:i') : ''}}</td>
        </tr>
        <tr>
            <td>شروع نمونه‌گیری</td>
            <td class="ltr">{{$sample->started_at ? \Morilog\Jalali\Jalalian::forge($sample->started_at->timestamp)->format('Y/m/d 🕑 H:i') : ''}}</td>
        </tr>
        <tr>
            <td>بستن نمونه‌گیری</td>
            <td class="ltr">{{$sample->closed_at ? \Morilog\Jalali\Jalalian::forge($sample->closed_at->timestamp)->format('Y/m/d 🕑 H:i') : ''}}</td>
        </tr>
        <tr>
            <td>نمره‌دهی</td>
            <td class="ltr">{{$sample->scored_at ? \Morilog\Jalali\Jalalian::forge($sample->scored_at->timestamp)->format('Y/m/d 🕑 H:i') : ''}}</td>
        </tr>
    </table>
</div>
