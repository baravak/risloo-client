<div>
    <div class="mt-4">
        <label for="case_id" data-alias="manager_id" class="block mb-2 text-sm text-gray-700 font-medium">{{ __('Case') }}</label>
        <select class="select2-select" data-template="case_clients" name="case_id" data-title="manager.name manager.id" id="case_id" data-url="{{ isset($case) ? route('dashboard.cases.index', ['room' => $case->room->id]) : '' }}" data-url-pattern="{{ route('dashboard.cases.index', ['room' => '%%']) }}" data-relation="session_id">
            @isset($case)
            <option value="{{$case->id}}" data-json='{{$case}}' selected>{{$case->clients->pluck('user.name')->join('-')}}</option>
            @endisset
        </select>
    </div>

    <div class="mt-4 {{ isset($case) ? 'hidden' : '' }}">
        <h3 class="block mb-2 text-sm text-gray-700 font-medium">{{ __('Clients') }}</h3>
        @isset($case)
            @foreach ($case->clients as $client)
                <div class="mt-1">
                    <label class="inline-flex items-center group">
                        <input type="checkbox" id="client-{{ $client->id }}" name="client_id[]" value="{{$client->id}}" @radioChecked(request()->client, $client->id) class="w-3.5 h-3.5 border border-gray-600 focus:ring-2 focus:ring-offset-2">
                        <span class="text-sm text-gray-600 mr-2 group-hover:text-blue-600">@displayName ($client->user)</span>  
                    </label>
                </div>
            @endforeach
        @endisset
    </div>

    <div class="mt-4">
        <label for="session_id" data-alias="manager_id" class="block mb-2 text-sm text-gray-700 font-medium">{{ __('Session') }}</label>
        <select class="select2-select" data-template="sessions" name="session_id" data-title="manager.name manager.id" id="session_id" data-url="{{ isset($case) ? route('dashboard.sessions.index', ['case' => $case->id]) : '' }}" data-url-pattern="{{ route('dashboard.sessions.index', ['case' => '%%']) }}">
        </select>
    </div>
</div>