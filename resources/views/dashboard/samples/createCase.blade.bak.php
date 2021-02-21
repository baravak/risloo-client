<div class="tab-pane fade show active pt-3" id="case" role="tabpanel" aria-labelledby="case-tab">
    <div class="form-group form-group-m">
        <select class="select2-select form-control form-control-m has-clear" data-template="case_clients" name="case_id" data-title="manager.name manager.id" id="case_id" data-url="{{isset($case) ? route('dashboard.cases.index', ['room' => $case->room->id]) : ''}}" data-url-pattern="{{route('dashboard.cases.index', ['room' => '%%'])}}" data-relation="session_id">
            @isset($case)
                <option value="{{$case->id}}" data-json='{{$case}}' selected>{{$case->clients->pluck('user.name')->join('-')}}</option>
            @endisset
        </select>
        <label for="case_id">{{__('Case')}}</label>
    </div>

    <div class="form-group mb-0" id="client-list">
        <label>{{__('Clients')}}</label>
        <div id="client-null-tamplate" class="{{isset($case) ? 'd-none' : ''}}">
            ...
        </div>
        @isset($case)
            @foreach ($case->clients as $client)
                <div class="richak richak-xs richak-secondary richak-checkbox">
                    <input type="checkbox" id="client-{{$client->id}}" name="client_id[]" value="{{$client->id}}" @radioChecked(request()->client, $client->id)>
                    <label for="client-{{$client->id}}">
                        <span class="richak-icon"></span>
                        <span>
                            <div class="d-flex align-items-center fs-12 d-inline-block">
                                <span class="media media-sm media-primary">
                                    @isset($client->avatars->samll)
                                        <img src="{{$client->avatars->small->url}}">
                                    @else
                                    <span>{{$client->user->shortName}}</span>
                                    @endisset
                                </span>
                                <div class="pr-1">
                                    <div class="data-name">@displayName($client->user)</div>
                                </div>
                            </div>
                        </span>
                    </label>
                </div>
            @endforeach
        @endisset
    </div>
    <div class="form-group form-group-m">
        <select class="select2-select form-control form-control-m has-clear" data-template="sessions" name="session_id" data-title="manager.name manager.id" id="session_id" data-url="{{isset($case) ? route('dashboard.sessions.index', ['case' => $case->id]) : ''}}" data-url-pattern="{{route('dashboard.sessions.index', ['case' => '%%'])}}">
        </select>
        <label for="session_id">{{__('Session')}}</label>
    </div>

    <div class="richak richak-xs richak-secondary richak-checkbox d-none" id="client-template">
        <input type="checkbox">
        <label>
            <span class="richak-icon"></span>
            <span>
                <div class="d-flex align-items-center fs-12 d-inline-block">
                    <span class="media media-sm media-primary">
                        <img>
                    </span>
                    <div class="pr-1">
                        <div class="data-name"></div>
                    </div>
                </div>
            </span>
        </label>
    </div>
</div>
