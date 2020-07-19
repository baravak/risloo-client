<form action="{{route('dashboard.users.update', ['user' => $user->id])}}" method="POST">
    @csrf
    <input type="hidden" name="_method" value="PUT">
    <div class="card-body">
        @if (auth()->isAdmin())
            <div class="form-group form-group-m">
                <input type="text" class="form-control form-control-m" id="name" name="name" @formValue($user->name) placeholder="&nbsp;" autocomplete="off">
                <label for="name">{{__('Registered name')}}</label>
            </div>
        @endif

        <div class="form-group form-group-m">
            <input type="text" class="form-control form-control-m text-left direction-ltr" id="email" name="email" @formValue($user->email) placeholder="&nbsp;" autocomplete="off">
            <label for="email">{{__('Email')}}</label>
        </div>

        @can('update', $user->center)

        <div class="form-group form-group-m">
            <select class="select2-select form-control form-control-m" data-template="users" name="manager_id" data-avatar="user.avatar.tiny.url user.avatar.small.url" data-title="name id" id="manager_id" data-url="{{route('dashboard.users.index', ['type' => ['psychologist', 'operator']])}}" data-placeholder="{{__('Select :attribute', ['attribute' => __('Psychologist')])}}">
                <option value="{{$user->id}}" data-json="{{json_encode($user)}}">{{$user->center->manager->name ?: $user->center->manager->id}}</option>
            </select>
            <label for="psychologist_id">{{__('Psychologist')}}</label>
        </div>
        @endcan

        <button type="submit" class="btn btn-primary">
            {{__('Save personal profile data')}}
        </button>
    </div>
</form>
