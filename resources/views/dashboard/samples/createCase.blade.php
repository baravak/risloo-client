<input type="hidden" name="type" value="case_user">
<div>
    <div class="mt-4">
        <label for="case_id" data-alias="manager_id" class="block mb-2 text-sm text-gray-700 font-medium">{{ __('Case') }}</label>
        <select class="select2-select"  id="case_id" name="case_id" data-url="{{ isset($room) ? route('dashboard.cases.index', ['room' => $room->id, 'instance' => 1]) : '' }}" data-url-pattern="{{ route('dashboard.cases.index', ['room' => '%%', 'instance' => 1]) }}" data-relation="session_id" data-xhr-base="with-client-checkbox">
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
        <select class="select2-select" name="session_id"  id="session_id" data-url="{{ isset($case) ? route('dashboard.sessions.index', ['case' => $case->id, 'instance' => 1]) : '' }}" data-url-pattern="{{ route('dashboard.sessions.index', ['case' => '%%', 'instance' => 1]) }}">
            @isset($session)
            <option value="{{$session->id}}" selected>{{$session->id}}</option>
            @endisset
        </select>
        @isset($session)
        <div data-for="session_id" class="hidden">
            @include('dashboard.sessions.select2', ['sessions' => [$session]])
        </div>
        @endisset
    </div>
</div>
