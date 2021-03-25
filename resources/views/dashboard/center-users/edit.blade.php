@section('form_action'){{ route('dashboard.center.users.update', ['center' => $center->id, 'user' => $user->id]) }}@endsection
@extends('dashboard.create')
@section('form_content')
    <div>
        <label for="position" class="block mb-2 text-sm text-gray-700 font-medium">{{ __('Position') }}</label>
        @can('update', [$user, 'position'])
        <select name="position" id="position" class="border border-gray-500 h-10 rounded pl-4 pr-8 w-full text-sm focus:border-brand focus:outline-none focus:ring-2 focus:ring-offset-1 focus:ring-opacity-60">
            @php
                    $positions = ['manager', 'operator', 'client', 'psychologist'];
                    if(!auth()->isAdmin() && $center->manager->id != $center->acceptation->id)
                    {
                        array_shift($positions);
                        if($center->acceptation->position != 'manager')
                        {
                            array_shift($positions);
                        }
                    }
                @endphp
                @foreach ($positions as $position)
                    <option value="{{ $position }}" @selectChecked($user->position, $position)>@lang(ucfirst($position))</option>
                @endforeach
        </select>
        @else
            <select name="position" id="position" disabled class="border border-gray-500 h-10 rounded pl-4 pr-8 w-full text-sm focus:border-brand focus:outline-none focus:ring-2 focus:ring-offset-1 focus:ring-opacity-60">
                <option value="{{ $user->position }}" selected>@lang(ucfirst($user->position))</option>
            </select>
        @endcan
    </div>

    <div class="mt-4">
        <label for="name" class="block mb-2 text-sm text-gray-700 font-medium">{{ __('Client name') }}</label>
        <input type="text" name="name" @formValue($user->name) id="name" autocomplete="off" class="border border-gray-500 h-10 rounded px-4 w-full text-sm text-right dir-rtl focus:border-brand focus:outline-none focus:ring-2 focus:ring-offset-1 focus:ring-opacity-60">
        <div class="flex items-center text-xs text-gray-400 mt-2">
            <i class="fal fa-info-circle ml-1"></i>
            <span>{{ __('This name is only valid in your center') }}</span>
        </div>
    </div>
    <div class="mt-4">
        <h3 class="block mb-2 text-sm text-gray-700 font-medium">{{ __('Status') }}</h3>
        <div class="mt-1">
            <label class="inline-flex items-center group">
                <input type="radio" name="status" id="status-accept" value="accept" class="w-3.5 h-3.5 border border-gray-600 focus:ring-2 focus:ring-offset-2"{!! $user->accepted_at && !$user->kicked_at ? 'checked' : '' !!}>
                <span class="text-sm text-gray-600 mr-2 group-hover:text-blue-600">{{ __('Accept') }}</span>
            </label>
        </div>
        <div class="mt-1">
            <label class="inline-flex items-center group">
                <input type="radio" name="status" id="status-kick" value="kick" {!! $user->kicked_at ? 'checked' : '' !!} class="w-3.5 h-3.5 border border-gray-600 focus:ring-2 focus:ring-offset-2">
                <span class="text-sm text-gray-600 mr-2 group-hover:text-blue-600">{{ __('Kick') }}</span>
            </label>
        </div>
    </div>
@endsection
