@can('scoring', $sample)
<form action="{!! urldecode(route('dashboard.samples.scoring', $sample->id)) !!}" method="POST" class="inline-flex" id="scoring-btn">
    <button type="submit" class=" items-center px-6 h-8 text-xs text-white bg-brand hover:bg-brand-600 rounded-full transition ml-1">
        {{ __("Scoring") }}
    </button>
</form>
@endcan
@if (in_array($sample->status, ['seald', 'open']))
    <form action="{!! urldecode(route('dashboard.samples.close', $sample->id)) !!}" method="POST" class="inline-flex">
        @method('PUT')
    <button type="submit" class="inline-flex items-center px-6 h-8 text-xs text-red-600 hover:text-white hover:bg-red-600 border border-red-600 rounded-full transition status-action ml-1">
        {{ __("Close sample") }}
    </button>
    </form>
@elseif($sample->status == 'closed')
    <form action="{!! urldecode(route('dashboard.samples.open', $sample->id)) !!}" method="POST" class="inline-flex">
        @method('PUT')
        <button type="submit" class="inline-flex items-center px-6 h-8 text-xs text-brand hover:text-white hover:bg-brand border border-brand rounded-full transition status-action ml-1">
        {{ __("Open sample") }}
    </button>
    </form>
@endif

@if (config('app.env') == 'local' && in_array($sample->status, ['seald', 'open']))
<a href="{{ config('app.server')}}/command/assessment/fill/{{substr($sample->id, 1)  . '?replace=on' }}" class="inline-flex items-center px-4 h-8 text-xs text-yellow-500 hover:text-white hover:bg-yellow-500 border border-yellow-500 rounded-full transition lijax status-action ml-1">
        {{ __('Fill in') }}
</a>
{{-- <div class="relative inline-flex dropdown ml-1">
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
</div> --}}
@endif
