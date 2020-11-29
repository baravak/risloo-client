@extends($layouts->dashboard)

@section('content')
<div class="card mb-3" id="sample-show" data-status="{{$sample->status}}" data-sample="{{$sample->id}}">
    <div class="card-header">
        <h5 class="card-title">
            {{ $sample->scale->title }} <small> / {{$sample->client ? $sample->client->name: ''}}</small>
            <a href="{!!urldecode(route('dashboard.samples.scoring', $sample->id))!!}" data-lijax-preload="scoring-preload" data-lijax-succsess="" id="scoring-btn" data-method="POST" class="badge badge-info fs-12 p-1 lijax {{($sample->status =='closed' || (auth()->isAdmin() && $sample->status == 'done') || $sample->score_last_version != $sample->score_current_version ) && $sample->client ? '' : 'd-none'}}">
                {{__("Scoring")}}
            </a>
            <span id="scoring-preload" class="badge badge-light fs-12 p-1 {{$sample->status == 'scoring' ? '' : 'd-none'}}">
                <i class="fas fa-cog fa-spin"></i> {{__("Scoring")}}...
            </span>
            @if (in_array($sample->status, ['seald', 'open']))
                <a href="{!! urldecode(route('dashboard.samples.close', $sample->id))!!}" class="badge badge-info fs-12 p-1 lijax status-action" data-method="PUT">
                    {{__('Close sample')}}
                </a>
            @elseif($sample->status == 'closed')
                <a href="{!! urldecode(route('dashboard.samples.open', $sample->id))!!}" class="badge badge-secondary fs-12 p-1 lijax status-action" data-method="PUT">
                    {{__('Open sample')}}
                </a>
            @endif
            @if (config('app.env') == 'local' && in_array($sample->status, ['seald', 'open']))
            <span class="dropdown">
                <button class="btn btn-secondary dropdown-toggle fs-12 p-1" type="button" id="assessmentFill" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    پرکردن
                </button>
                <div class="dropdown-menu" aria-labelledby="assessmentFill">
                    <form action="{{config('app.server')}}/command/assessment/fill/{{substr($sample->id, 1)}}" class="fs-12 p-1">
                        <label class="d-block">
                            <input type="checkbox" name="replace" checked>
                            <span>ویرایش داده‌های قبلی</span>
                        </label>
                        <label class="d-block">
                            <input type="checkbox" name="empty">
                            <span>فیلد خالی</span>
                        </label>
                        <label class="d-block">
                            <input type="checkbox" name="validity">
                            <span>اعتبارسنجی</span>
                        </label>
                        <button type="submit">پرکردن</button>
                    </form>
                </div>
            </span>
            @endif
            <span class="dropdown {{in_array($sample->status, ['seald', 'open', 'closed', 'scoring']) ? 'd-none' : ''}}" id="profile-export-menu">
                <button class="btn btn-secondary dropdown-toggle fs-12 p-1" type="button" id="profile-export" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-cog fa-spin {{$sample->status == 'done' ? 'd-none' : ''}}"></i>
                    خروجی‌ها
                </button>
                <div class="dropdown-menu" aria-labelledby="profile-export" id="profile-export-list">
                    @if ($sample->profiles)
                        @foreach ($sample->profiles->getAttributes() as $key => $item)
                        <a href="{!!$item->url!!}" target="_blank" data-type="{{$key}}" class="dropdown-item fs-12 profile-link profile-{{$key}}">
                            {{ strtoupper(str_replace('_', ' ', str_replace('profile_', '', $key)))}}
                        </a>
                        @endforeach
                    @endif
                </div>
            </span>
        </h5>
        <div class="text-center col-12 col-xl-6 mx-auto" id="profile_svg">
            @if ($sample->status == 'scoring')
                <i class="fas fa-cog fa-spin"></i>
            @endif
            @isset($sample->profiles->profile_svg)
                <img src="{{$sample->profiles->profile_svg->url}}" class="d-block profile-svg">
            @endisset
        </div>
    </div>
    @includeIf('dashboard.samples.scales.' . substr($sample->scale->id, 1), ['scoring'=> (object) ['profiles' => $sample->profiles, 'score' => $sample->score, 'id' => $sample->id]])
</div>
<div class="card mb-3">
    <div class="card-header">
        <h5 class="card-title">
            مواد آزمون
        </h5>
    </div>
    <div class="card-body">
        @if (in_array($sample->status, ['open', 'seald']))
            <div class="row">
                <div class="col-12 col-lg-6">
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
                </div>
            </div>
        @endif
        <div class="row">
            <div class="col-12">
                <h6>عمومی</h6>
            </div>
            <div class="col-12 col-md-6">
                <div class="form-group form-group-m">
                    <input @formValue($sample->cornometer) disabled class="form-control form-control-m d-notification form-items font-weight-bold" type="number" name="cornometer" id="cornometer" placeholder="&nbsp;" data-lijax="500" data-method="put">
                    <label for="cornometer">زمان انجام <sup>دقیقه</sup></label>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-12">
                <h6>پیش‌نیازها</h6>
            </div>
            @foreach ($sample->prerequisites as $prerequisite)
            <div class="col-12 col-lg-6">
                <div class="form-group form-group-m">
                    @if (in_array($prerequisite->answer->type, ['options', 'select']))
                        <select type="text" data-action="{{urldecode(route('samples.storeItems', $sample->id, 1))}}" data-method="post" data-prerequisite="{{$loop->index + 1}}" data-name="prerequisites[{{$loop->index}}][1]" data-merge='{"prerequisites[{{$loop->index}}][0]" : {{$loop->index + 1}}}' data-lijax="change" id="prerequisite-{{$loop->index}}" class="form-items form-control form-control-m font-weight-bold d-notification" placeholder="&nbsp;" disabled>
                            <option></option>
                            @foreach ($prerequisite->answer->options as $option)
                                <option {{isset($prerequisite->user_answered) && $prerequisite->user_answered == $loop->index +1 ? 'selected' : ''}} value="{{$loop->index + 1}}" @selectChecked($prerequisite->user_answered, $loop->index + 1)>{{$loop->index + 1}}: {{$option}}</option>
                            @endforeach
                        </select>
                    @elseif (in_array($prerequisite->answer->type, ['text', 'number']))
                        <input @formValue($prerequisite->user_answered) disabled class="form-items form-control form-control-m font-weight-bold d-notification" type="{{$prerequisite->answer->type}}" id="prerequisite-{{$loop->index}}" placeholder="&nbsp;">
                    @endif
                    <label for="prerequisite-{{$loop->index}}">{{$loop->index + 1}} - {{$prerequisite->text}}</label>
                </div>
            </div>
            @endforeach
        </div>
        <div class="row mt-3">
            <div class="col-12">
                <h6>گویه‌ها</h6>
            </div>
            @foreach ($sample->items as $item)
                <div class="col-12 col-xl-6">
                    <div class="form-group form-group-m">
                        @include('dashboard.samples.shows.'. $item->answer->type)
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
