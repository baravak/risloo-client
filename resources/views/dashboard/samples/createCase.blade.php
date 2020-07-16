<div class="tab-pane fade show active pt-3" id="case" role="tabpanel" aria-labelledby="case-tab">
    <div class="form-group form-group-m">
        <select class="select2-select form-control form-control-m has-clear" data-template="case_clients" name="case_id" data-title="manager.name manager.id" id="case_id" data-url-pattern="{{route('dashboard.cases.index', ['room' => '%%'])}}">
        </select>
        <label for="case_id">{{__('Case')}}</label>
    </div>

    <div class="form-group mb-0" id="client-list">
        <label>{{__('Clients')}}</label>
        <div id="client-null-tamplate">
            ...
        </div>
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
