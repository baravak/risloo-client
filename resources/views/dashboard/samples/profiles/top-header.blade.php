<table class="w-100" id="top-header">
    <tr>
        <td id="qrcode">
            <a href="https://r1l.ir/{{$sample->id}}" style="width: 50px">{!! QrCode::size(60)->color(60, 110, 130)->generate('https://r1l.ir/' . $sample->id); !!}</a>
        </td>
        <td class="pr-2">
            <div class="ltr">
                <strong>{{$sample->id}}</strong>
            </div>
            <div>
                <strong>@displayName($sample->client)</strong>
            </div>
            <div>
                {{$sample->room->owner->id == $sample->owner->id ? __('Personal clinic') : $sample->room->owner->name }}
                <br>@displayName($sample->owner)
            </div>
        </td>
        <td class="pr-2">
            <div class="row ">

            @foreach ($sample->prerequisite as $item)
                @isset($item->user_answered)
                <div class="col-4">
                    <span>{{$item->text}}</span>
                    <strong>
                            {{in_array($item->answer->type, ['option', 'select']) ? $item->answer->options[$item->user_answered - 1] : $item->user_answered}}
                        </strong>
                    </div>
                @endisset
            @endforeach
            </div>
        </td>
    </tr>
</table>
