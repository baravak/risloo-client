@section('auth-form')
    <div class="flex justify-between items-center border border-gray-300 rounded p-2 mb-2 bg-gray-50">
        <a href="{{ route('dashboard.centers.show', $bulk->room->center->id) }}" class="flex justify-center items-center flex-shrink-0 w-14 h-14 bg-gray-300 text-gray-600 text-xs rounded-full border-2 border-white overflow-hidden">
            <img src="@attachmentLink($bulk->room->center->detail->avatar, 'small')" class="w-full h-full object-cover object-center">
        </a>
        <div class="text-center px-1">
            <a href="{{ route('dashboard.centers.show', $bulk->room->center->id) }}" class="block text-sm font-semibold text-gray-800 hover:text-brand transition">@center($bulk->room->center)</a>
            <a href="{{ route('dashboard.rooms.show', $bulk->room->id) }}" class="block text-xs text-gray-600 hover:text-brand transition mt-1">@lang('Therapy room of :user', ['user' => $bulk->room->manager->name])</a href="#">
        </div>
        <a href="{{ route('dashboard.rooms.show', $bulk->room->id) }}" class="flex justify-center items-center flex-shrink-0 w-14 h-14 bg-gray-300 text-gray-600 text-xs rounded-full border-2 border-white overflow-hidden">
            <img src="@attachmentLink($bulk->room->manager->avatar, 'small')" class="w-full h-full object-cover object-center">
        </a>
    </div>
    <div class="flex flex-col border border-gray-300 rounded p-4 bg-gray-50 mb-4">
        <h3 class="text-sm font-semibold text-gray-700 mb-2">لیست آزمون‌ها</h3>
        <div class="w-full max-h-14 overflow-y-auto bg-gray-100 rounded p-3">
            <ul class="samplesLogin-list">
                @foreach ($bulk->scales as $scale)
                    <li>{{ $scale->title }}</li>
                @endforeach
            </ul>
        </div>

        <span class="text-xs text-gray-600 mt-4">
            در این فرایند، آزمون‌های فوق برای شما فعال شده و می‌توانید آن‌ها را تکمیل کنید.
        </span>
        @if (!$bulk->room->center->acceptation)
            <span class="text-xs text-gray-600 mt-1">
                پس از این مرحله، شما عضو این مرکز درمانی و اتاق درمان خواهید شد و مدیران قادر به دیدن شماره تماس شما می‌باشند.
            </span>
        @endif

        @if (!$bulk->room->center->acceptation)
        <div class="mt-4">
            <label for="nickname" class="block mb-2 text-sm text-gray-700 font-medium">{{ __('My nickname') }}</label>
            <input type="text" class="w-full text-sm border border-gray-200 rounded-sm" id="nickname" name="nickname" value="{{ auth()->user()->name }}" placeholder="{{ __('Nickname') }}">
        </div>
        @endif
        <button type="submit" class="flex items-center justify-center w-full h-10 text-sm rounded-full bg-brand text-white hover:bg-brand-600 transition mt-4 focus">تأیید و ادامه</button>
    </div>
@endsection

@extends('auth.theory')
