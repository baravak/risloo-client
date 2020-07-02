@extends($layouts->dashboard)

@section('content')
<div class="card mb-3">
    <div class="card-header">
        <h5 class="card-title">
            {{ $sample->scale->title }} <small> / {{$sample->client->name}}</small>
            <a href="{!!urldecode(route('dashboard.samples.scoring', $sample->id))!!}" data-method="POST" class="badge badge-info fs-12 p-1 lijax">
                {{__("Scoring")}}
            </a>
        </h5>
    </div>
    <div class="card-body">
        @include('dashboard.samples.scales.' . substr($sample->scale->id, 1))
    </div>
</div>
<div class="card">
    <div class="card-header">
        <h6 class="card-title">
            گویه‌ها
        </h6>
    </div>
    <div class="card-body">
        @if (in_array($sample->status, ['open', 'seald']))
            <div class="richak richak-xs richak-secondary richak-checkbox">
                <input type="checkbox" id="editable">
                <label for="editable">
                    <span class="richak-icon"></span>
                    <span>
                        <div class="d-flex align-items-center fs-12 d-inline-block">
                            <div class="pr-1">
                                قابلیت ویرایش فرم
                            </div>
                        </div>
                    </span>
                </label>
            </div>
        @endif
        <form action="" method="post">
            @foreach ($sample->items as $item)
            <div class="form-group form-group-m">
                <select type="text" data-action="{{urldecode(route('samples.storeItems', $sample->id, 1))}}" data-method="post" data-item="{{$loop->index + 1}}" data-name="items[{{$loop->index}}][1]" data-merge='{"items[{{$loop->index}}][0]" : {{$loop->index + 1}}}' data-lijax="change" id="item-{{$loop->index}}" class="form-items form-control form-control-m font-weight-bold" placeholder="&nbsp;" disabled>
                    <option></option>
                    @foreach ($item->answer->options as $option)
                        <option {{isset($item->user_answered) && $item->user_answered == $loop->index +1 ? 'selected' : ''}} value="{{$loop->index + 1}}">{{$loop->index + 1}}: {{$option}}</option>
                    @endforeach
                </select>
                <label for="item-{{$loop->index}}">{{$loop->index + 1}} - {{$item->text}}</label>
            </div>
            @endforeach
        </form>
    </div>
</div>
@endsection
