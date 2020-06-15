<div class="tab-pane fade show active pt-3" id="room" role="tabpanel" aria-labelledby="room-tab">
    <div class="form-group mb-0">
        <label>{{__('Create a case before doing the sample')}}</label>
        <div class="richak richak-xs richak-secondary richak-radio">
            <input type="radio" name="case-auto-create" id="case-auto-create-no" value="no" checked>
            <label for="case-auto-create-no">
                <span class="richak-icon"></span>
                <span>{{__('Without create case')}}</span>
            </label>
        </div>

        <div class="richak richak-xs richak-secondary richak-radio">
            <input type="radio" name="case-auto-create" id="case-auto-create-individual" value="individual">
            <label for="case-auto-create-individual">
                <span class="richak-icon"></span>
                <span>{{__('Create individual case')}}</span>
            </label>
        </div>

        <div class="richak richak-xs richak-secondary richak-radio">
            <input type="radio" name="case-auto-create" id="case-auto-create-group" value="group">
            <label for="case-auto-create-group">
                <span class="richak-icon"></span>
                <span>{{__('Create group case')}}</span>
            </label>
        </div>
    </div>
    <div class="form-group form-group-m">
        <select class="select2-select form-control form-control-m has-clear sample-page" multiple data-template="users" id="room_client_id" name="client_id[]" data-title="name id" id="client_id" data-url-pattern="{{route('dashboard.room.users.index', ['room' => '%%'])}}" data-placeholder="{{__('Without specified client')}}">
        </select>
        <label for="client_id">{{__('Client')}}</label>
    </div>
    <div class="form-group form-group-m">
        <input type="text" class="form-control form-control-m sample-page" id="count" name="count" placeholder="&nbsp;" autocomplete="off">
        <label for="count">{{__('Count')}}</label>
    </div>
</div>
