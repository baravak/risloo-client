@extends('dashboard.create')
@section('form_content')

<div>
    <div class="mt-4 {{ isset($center) ? 'hidden' : '' }}">
        <h3 class="block mb-2 text-sm text-gray-700 font-medium">{{ __('Clinic type') }}</h3>
        <div class="mt-1">
            <label class="inline-flex items-center group">
                <input type="radio" name="type" id="type-personal_clinic" value="personal_clinic" checked @radioChecked($user->gender, 'male') @radioChecked($center->type, 'personal_clinic') {!!isset($center) ? 'disabled' : ''!!} class="w-3.5 h-3.5 border border-gray-600 focus:ring-2 focus:ring-offset-2">
                <span class="text-sm text-gray-600 mr-2 group-hover:text-blue-600">{{ __('Personal') }}</span>
            </label>
        </div>
        <div class="mt-1">
            <label class="inline-flex items-center group">
                <input type="radio" name="type" id="type-counseling_center" value="counseling_center" @radioChecked($center->type, 'counseling_center') {!!isset($center) ? 'disabled' : ''!!} class="w-3.5 h-3.5 border border-gray-600 focus:ring-2 focus:ring-offset-2">
                <span class="text-sm text-gray-600 mr-2 group-hover:text-blue-600">{{ __('Counseling center') }}</span>
            </label>
        </div>
    </div>

    @if (auth()->isAdmin() && (!isset($center) || (isset($center) && $center->type == 'counseling_center')))
    <div class="form-group mt-4">
            <label for="manager_id" data-alias="manager_id" class="block mb-2 text-sm text-gray-700 font-medium">{{ __('Manager') }}</label>
            <select class="select2-select" name="manager_id"  id="manager_id" data-url="{{route('dashboard.users.index', isset($center) ? ['personal_clinic' => $center->type == 'counseling_center' ? 'yes' : 'no'] : null)}}">
                @isset($center)
                    <option value="{{$center->manager->user_id}}" selected>{{$center->manager->name}}</option>
                @endisset
            </select>
            @isset($center)
                <div data-for="manager_id">
                        @include('dashboard.users.select2', ['users' => [App\User::apishow($center->manager->user_id)]])
                </div>
            @endisset
    </div>
    @endif

    @if (!isset($center) || (isset($center) && $center->type == 'counseling_center'))
    <div class="form-group mt-4">
        <label for="title" class="block mb-2 text-sm text-gray-700 font-medium">{{ __('Title') }}</label>
        <input type="text" name="title" id="title" autocomplete="off" @formValue($center->detail->title) class="border border-gray-500 h-10 rounded px-4 w-full text-sm focus:border-brand focus:outline-none focus:ring-2 focus:ring-offset-1 focus:ring-opacity-60">
    </div>
    <div class="form-group mt-4">
        <label for="avatar" class="block mb-2 text-sm text-gray-700 font-medium">{{ __('Avatar') }}</label>
        <input type="file" name="avatar" id="avatar" placeholder="&nbsp;" autocomplete="off">
    </div>
    @endif

    <div class="mt-4">
        <label for="address" class="block mb-2 text-sm text-gray-700 font-medium">{{ __('Address') }}</label>
        <input type="text" name="address" id="address" autocomplete="off" @formValue($center->detail->address) placeholder="{{ __('Optional') }}" class="border border-gray-500 h-10 rounded px-4 w-full text-sm placeholder-gray-300 focus:border-brand focus:outline-none focus:ring-2 focus:ring-offset-1 focus:ring-opacity-60">
    </div>

    <div class="mt-4">
        <div>
            <label for="phone_numbers"  data-alias="manager_id" class="block mb-2 text-sm text-gray-700 font-medium">{{ __('Phone numbers') }}</label>
            <select class="select2-select placeholder-gray-300" data-tags="true" placeholder="{{ __('Optional') }}" multiple name="phone_numbers[]" id="phone_numbers">
                @isset($center)
                @foreach ($center->detail->phone_numbers ?: [] as $number)
                    <option value="{{$number}}" selected>{{$number}}</option>
                @endforeach
                @endisset
            </select>
        </div>
    </div>

    <div class="mt-4">
        <label for="description" class="block mb-2 text-sm text-gray-700 font-medium">{{ __('Description') }}</label>
        <textarea id="description" name="description" placeholder="{{ __('Optional') }}" autocomplete="off" class="resize-none border border-gray-500 h-20 rounded px-4 py-2 w-full text-sm placeholder-gray-300 focus:border-brand focus:outline-none focus:ring-2 focus:ring-offset-1 focus:ring-opacity-60">@isset($center->detail->description){{ $center->detail->description }}@endisset</textarea>
    </div>
</div>
@endsection
