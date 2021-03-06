@extends($layouts->dashboard)

@section('content')
    <div id="sample-show" data-status="{{$sample->status}}" data-sample="{{$sample->id}}">
        <div class="mt-8 mb-4">
            <h3 class="heading">{{ $sample->scale->title }}</h3>
        </div>

        <div class="flex items-center justify-between border border-gray-200 rounded p-4">
            <div class="flex items-center text-sm text-gray-600 cursor-default">
                <i class="fal fa-user mb-1 ml-2"></i>
                <span>{{ $sample->client ? $sample->client->name: '' }}</span>
            </div>
            <div>
                <a href="{!! urldecode(route('dashboard.samples.scoring', $sample->id)) !!}" class="inline-flex items-center px-4 h-8 text-xs text-white bg-brand hover:bg-brand-600 rounded-full transition ml-1 {{($sample->status =='closed' || (auth()->isAdmin() && $sample->status == 'done') || $sample->score_last_version != $sample->score_current_version ) && $sample->client ? '' : 'hidden'}}" data-lijax-preload="scoring-preload" data-lijax-succsess="" id="scoring-btn" data-method="POST">
                    {{ __("Scoring") }}
                </a>
                @if (in_array($sample->status, ['seald', 'open']))
                <a href="{!! urldecode(route('dashboard.samples.close', $sample->id)) !!}" class="inline-flex items-center px-4 h-8 text-xs text-red-600 hover:text-white hover:bg-red-600 border border-red-600 rounded-full transition lijax status-action ml-1" data-method="PUT">
                    {{ __("Close sample") }}
                </a>
                @elseif($sample->status == 'closed')
                <a href="{!! urldecode(route('dashboard.samples.open', $sample->id)) !!}" class="inline-flex items-center px-4 h-8 text-xs text-brand hover:text-white hover:bg-brand border border-brand rounded-full transition lijax status-action ml-1" data-method="PUT">
                    {{ __("Open sample") }}
                </a>
                @endif

                @if (config('app.env') == 'local' && in_array($sample->status, ['seald', 'open']))
                <div class="relative inline-flex dropdown ml-1">
                    <button class="flex items-center px-4 h-8 text-xs text-brand hover:text-white hover:bg-brand border border-brand rounded-full transition" type="button" id="assessmentFill" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{ __('Fill in') }}
                        <i class="fal fa-chevron-down mr-2"></i>
                    </button>
                    <div aria-labelledby="assessmentFill" class="absolute left-0 top-10 w-52 p-4 rounded bg-white border border-gray-200 shadow-lg">
                        <form action="{{ config('app.server')}}/command/assessment/fill/{{substr($sample->id, 1) }}">
                            <label class="flex items-center group">
                                <input type="checkbox" name="replace" checked class="w-3.5 h-3.5 border border-gray-600 rounded-sm focus:ring-1 focus:ring-offset-1">
                                <span class="text-sm text-gray-600 mr-2 group-hover:text-blue-600">{{ __('Edit prev data') }}</span>
                            </label>
                            <label class="flex items-center mt-2 group">
                                <input type="checkbox" name="empty" class="w-3.5 h-3.5 border border-gray-600 rounded-sm focus:ring-1 focus:ring-offset-1">
                                <span class="text-sm text-gray-600 mr-2 group-hover:text-blue-600">{{ __('Empty field') }}</span>
                            </label>
                            <label class="flex items-center mt-2 group">
                                <input type="checkbox" name="validity" class="w-3.5 h-3.5 border border-gray-600 rounded-sm focus:ring-1 focus:ring-offset-1">
                                <span class="text-sm text-gray-600 mr-2 group-hover:text-blue-600">{{ __('Validation') }}</span>
                            </label>
                            <div class="flex justify-center mt-4">
                                <button type="submit" class="flex items-center px-4 py-2 text-xs text-white bg-brand hover:bg-brand-600 rounded-full transition">{{ __("Fill in") }}</button>
                            </div>
                        </form>
                    </div>
                </div>
                @endif

                <div class="relative inline-flex dropdown {{in_array($sample->status, ['seald', 'open', 'closed', 'scoring']) ? 'hidden' : ''}}" id="profile-export-menu">
                    <button class="flex items-center px-4 h-8 text-xs text-brand hover:text-white hover:bg-brand border border-brand rounded-full transition dropdown-toggle" type="button" id="profile-export" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{ __('Exports') }}
                        <i class="fal fa-chevron-down mr-2"></i>
                    </button>
                    <div aria-labelledby="profile-export" id="profile-export-list" class="absolute left-0 top-10 rounded bg-white border border-gray-200 shadow-lg dropdown-menu">
                        @if ($sample->profiles)
                            @foreach ($sample->profiles->getAttributes() as $key => $item)
                                <a href="{!!$item->url!!}" data-type="{{$key}}" class="dropdown-item direct profile-{{$key}} block w-full p-1 text-center rounded text-gray-600 hover:text-brand hover:bg-gray-100">
                                    {{ strtoupper(str_replace('_', ' ', str_replace('profile_', '', $key))) }}
                                </a>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
        @includeIf('dashboard.samples.scales.' . substr($sample->scale->id, 1), ['scoring'=> (object) ['profiles' => $sample->profiles, 'score' => $sample->score, 'id' => $sample->id]])
    </div>

    <div>
        <div class="flex items-center justify-between mt-8">
            <h3 class="heading">{{ __('Sample details') }}</h3>

            @if (in_array($sample->status, ['open', 'seald']))
                <label class="flex items-center group px-4 py-2 border border-gray-300 rounded hover:border-brand">
                    <input type="checkbox" id="editable" class="w-3.5 h-3.5 border border-gray-600 hover:border-brand rounded-sm focus:ring-1 focus:ring-offset-1">
                    <span class="text-sm text-gray-600 mr-2 group-hover:text-brand">{{ __('Editable') }}</span>
                </label>
            @endif
        </div>

        <div class="border border-gray-200 rounded p-4 mt-4">
            <h4 class="font-semibold text-gray-700 mb-4">{{ __('General') }}</h4>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
                <div>
                    <label for="cornometer" class="block mb-2 text-sm text-gray-700 font-medium">{{ __('Time to do') }} ({{ __('Minutes') }})</label>
                    <input @formValue($sample->cornometer) disabled type="number" name="cornometer" id="cornometer" placeholder="&nbsp;" data-lijax="500" data-method="put" class="border border-gray-500 h-10 rounded px-4 w-full text-sm focus:border-brand focus:outline-none focus:ring-2 focus:ring-offset-1 focus:ring-opacity-60">
                </div>
            </div>
        </div>

        <div class="border border-gray-200 rounded p-4 mt-4">
            <h4 class="font-semibold text-gray-700 mb-4">{{ __('Prerequisites') }}</h4>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
                @foreach ($sample->prerequisites as $prerequisite)
                    <div>
                        <label for="prerequisite-{{$loop->index}}" class="block mb-2 text-sm text-gray-700 font-medium">{{$loop->index + 1}} - {{$prerequisite->text}}</label>
                        @if (in_array($prerequisite->answer->type, ['options', 'select']))
                        <select type="text" data-action="{{urldecode(route('samples.storeItems', $sample->id, 1))}}" data-method="post" data-prerequisite="{{$loop->index + 1}}" data-name="prerequisites[{{$loop->index}}][1]" data-merge='{"prerequisites[{{$loop->index}}][0]" : {{$loop->index + 1}}}' data-lijax="change" id="prerequisite-{{$loop->index}}" placeholder="&nbsp;" disabled class="border border-gray-500 h-10 rounded px-4 w-full text-sm focus:border-brand focus:outline-none focus:ring-2 focus:ring-offset-1 focus:ring-opacity-60">
                            <option></option>
                            @foreach ($prerequisite->answer->options as $option)
                                <option {{isset($prerequisite->user_answered) && $prerequisite->user_answered == $loop->index +1 ? 'selected' : ''}} value="{{$loop->index + 1}}" @selectChecked($prerequisite->user_answered, $loop->index + 1)>{{$loop->index + 1}}: {{$option}}</option>
                            @endforeach
                        </select>
                        @elseif (in_array($prerequisite->answer->type, ['text', 'number']))
                            <input @formValue($prerequisite->user_answered) disabled type="{{$prerequisite->answer->type}}" id="prerequisite-{{$loop->index}}" placeholder="&nbsp;" class="border border-gray-500 h-10 rounded px-4 w-full text-sm focus:border-brand focus:outline-none focus:ring-2 focus:ring-offset-1 focus:ring-opacity-60">
                        @endif
                    </div>
                @endforeach
            </div>
        </div>

        <div class="border border-gray-200 rounded p-4 mt-4">
            <h4 class="font-semibold text-gray-700 mb-4">{{ __('Sample items') }}</h4>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                @foreach ($sample->items as $item)
                    <div>
                        @include('dashboard.samples.shows.'. $item->answer->type)
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection