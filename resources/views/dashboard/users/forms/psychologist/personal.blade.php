@extends('dashboard.users.forms.edit._personal')
@if (auth()->isAdmin())
    @section('custom-personal')
    <div class="form-group form-group-m">
        <select type="text" class="form-control form-control-m" id="position" name="position" placeholder="&nbsp;" autocomplete="off" @formValue($user->position)>
            <option value="supervisor" @selectChecked($user->position, 'supervisor')>
                {{__('Supervisor')}}
            </option>
            <option value="therapist" @selectChecked($user->position, 'therapist')>
                {{__('Therapist')}}
            </option>
            <option value="under-supervision" @selectChecked($user->position, 'under-supervision')>
                {{__('Under supervision')}}
            </option>
        </select>
        <label for="position">{{__('Position')}}</label>
    </div>
    @endsection
@endif
