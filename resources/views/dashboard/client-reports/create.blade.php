<form class="m-auto w-full md:w-1/2" action="{{ route('dashboard.client-reports.store', $result[1]) }}" method="POST">
    @csrf
    <input type="hidden" name="_method" value="{{isset($this->report) ? 'PUT' : 'POST'}}">
    <input type="hidden" name="{{ $result[0] }}_id" value="{{ $result[1] }}">
    <div class="border border-gray-200 rounded p-4 mt-8">
        <div>
            <label for="title" class="block mb-2 text-sm text-gray-700 font-medium">@lang('Title')</label>
            <input type="text" name="title" id="title" autocomplete="off" class="border border-gray-500 h-10 rounded px-4 w-full text-sm focus:border-brand focus:outline-none focus:ring-2 focus:ring-offset-1 focus:ring-opacity-60 placeholder-gray-400 placehol" placeholder="مثال: گزارش شخصی روز ۲۱ خرداد">
        </div>
        <div class="mt-4">
            <label for="time_picker" class="block mb-2 text-sm text-gray-700 font-medium">@lang('Time')</label>
            <input type="text" readonly id="time_picker" dpicker-time="true" data-picker-alt="reported_at" value="{{ time() }}" class="border border-gray-500 h-10 rounded px-4 w-full text-sm focus:border-brand focus:outline-none focus:ring-2 focus:ring-offset-1 focus:ring-opacity-60 date-picker dir-ltr text-left">
            <input type="hidden" name="reported_at" id="reported_at">
        </div>
        <div class="mt-4">
            <label for="content" class="block mb-2 text-sm text-gray-700 font-medium">{{ __('Report content') }}</label>
            <textarea id="content" name="content" autocomplete="off" @formValue($case->content) class="resize-none border border-gray-500 h-24 rounded px-4 py-2 w-full text-sm placeholder-gray-300 focus:border-brand focus:outline-none focus:ring-2 focus:ring-offset-1 focus:ring-opacity-60"></textarea>
        </div>
        <div class="mt-4">
            <label for="cc[]" class="block mb-2 text-sm text-gray-700 font-medium">{{ __('CC to') }}</label>
            <select class="select2-select" multiple  name="cc[]"  id="cc" data-url="{{ route('dashboard.center.users.index', ['center' => $center->id, 'position' => join(',',config('users.room_managers'))])}}" data-placeholder="{{ __('Select :attribute', ['attribute' => __('User')]) }}">
                @if (isset($user))
                    <option value="{{$user->id}}">
                        {{$user->name}}
                    </option>
                @endif
            </select>
        </div>
        <div class="mt-4">
            @isset($case->clients)
                <h3 class="block mb-3 text-sm text-gray-700 font-medium">{{ __('Clients') }}</h3>
            @endisset
            @foreach ($case->clients as $client)
            <label class="inline-flex items-center group">
                <input type="checkbox" name="clients_id[]" id="clients_id" checked value="{{ $client->id }}" class="w-3.5 h-3.5 border border-gray-600 rounded-sm focus:ring-1 focus:ring-offset-1">
                <span class="text-sm text-gray-600 mr-2 group-hover:text-blue-600">{{ $client->name }}</span>
            </label>
            @endforeach
        </div>
        <div class="mt-6">
            <button type="submit" class="inline-flex justify-center items-center h-9 px-8 bg-brand text-white text-sm rounded-full hover:bg-brand-600 transition ml-4 focus" title="" aria-label="" role="button">
                @lang('Create report')
            </button>
        </div>
    </div>
</form>
