<div>
    <div class="mt-4">
        <label for="case_id" data-alias="manager_id" class="block mb-2 text-sm text-gray-700 font-medium">{{ __('Case') }}</label>
        <select class="select2-select" data-template="case_clients" name="case_id" data-title="manager.name manager.id" id="case_id" data-url="{{ isset($case) ? route('dashboard.cases.index', ['room' => $case->room->id, 'instance' => 1]) : '' }}" data-url-pattern="{{ route('dashboard.cases.index', ['room' => '%%', 'instance' => 1]) }}" data-relation="session_id">
            @isset($case)
            <option value="{{$case->id}}" selected>{{$case->clients->pluck('user.name')->join('-')}}</option>
            @endisset
        </select>
        @isset($case)
        <div data-for="case_id" class="hidden">
            @include('dashboard.cases.sampleSelect2', ['cases' => [$case]])
        </div>
        @endisset
    </div>
    <div data-xhr="case-clients">

    </div>

    <div class="mt-4">
        <label for="session_id" data-alias="manager_id" class="block mb-2 text-sm text-gray-700 font-medium">{{ __('Session') }}</label>
        <select class="select2-select" data-template="sessions" name="session_id" data-title="manager.name manager.id" id="session_id" data-url="{{ isset($case) ? route('dashboard.sessions.index', ['case' => $case->id]) : '' }}" data-url-pattern="{{ route('dashboard.sessions.index', ['case' => '%%']) }}">
        </select>
    </div>
</div>
