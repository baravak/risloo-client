@include('dashboard.samples.profileShow')
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
                <input @formValue($sample->cornometer) disabled type="number" name="cornometer" id="cornometer" placeholder="&nbsp;" data-lijax="500" data-method="put" class="form-items d-notification border border-gray-500 h-10 rounded px-4 w-full text-sm focus:border-brand focus:outline-none focus:ring-2 focus:ring-offset-1 focus:ring-opacity-60">
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
                    <select type="text" data-action="{{urldecode(route('samples.storeItems', $sample->id, 1))}}" data-method="post" data-prerequisite="{{$loop->index + 1}}" data-name="prerequisites[{{$loop->index}}][1]" data-merge='{"prerequisites[{{$loop->index}}][0]" : {{$loop->index + 1}}}' data-lijax="change" id="prerequisite-{{$loop->index}}" placeholder="&nbsp;" disabled class="form-items d-notification border border-gray-500 h-10 rounded pl-4 pr-8 w-full text-sm focus:border-brand focus:outline-none focus:ring-2 focus:ring-offset-1 focus:ring-opacity-60 form-items d-notification">
                        <option></option>
                        @foreach ($prerequisite->answer->options as $option)
                            <option {{isset($prerequisite->user_answered) && $prerequisite->user_answered == $loop->index +1 ? 'selected' : ''}} value="{{$loop->index + 1}}" @selectChecked($prerequisite->user_answered, $loop->index + 1)>{{$loop->index + 1}}: {{$option}}</option>
                        @endforeach
                    </select>
                    @elseif (in_array($prerequisite->answer->type, ['text', 'number']))
                        <input @formValue($prerequisite->user_answered) disabled type="{{$prerequisite->answer->type}}" data-action="{{urldecode(route('samples.storeItems', $sample->id, 1))}}" data-method="post" data-prerequisite="{{$loop->index + 1}}" data-name="prerequisites[{{$loop->index}}][1]" data-merge='{"prerequisites[{{$loop->index}}][0]" : {{$loop->index + 1}}}' data-lijax="change" id="prerequisite-{{$loop->index}}" placeholder="&nbsp;" class="border border-gray-500 h-10 rounded pl-4 pr-8 w-full text-sm focus:border-brand focus:outline-none focus:ring-2 focus:ring-offset-1 focus:ring-opacity-60 form-items d-notification">
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
