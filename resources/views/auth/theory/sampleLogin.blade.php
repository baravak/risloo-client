@section('auth-form')

<div class="flex-1 flex justify-center items-center bg-gray-50">
    <div class="w-full sm:w-96 mx-4 sm:mx-auto">
        <div class="flex justify-between items-center border border-gray-300 rounded p-4 mb-2">
            <a href="{{ route('dashboard.centers.show', $bulk->room->center->id) }}" class="flex justify-center items-center flex-shrink-0 w-14 h-w-14 bg-gray-300 text-gray-600 text-xs rounded-full border-2 border-white overflow-hidden">
                <img src="@attachmentLink($bulk->room->center->detail->avatar, 'small')" class="w-full h-full object-cover object-center">
            </a>
            <div class="text-center px-2">
                <a href="{{ route('dashboard.centers.show', $bulk->room->center->id) }}" class="block font-semibold text-gray-800 hover:text-brand transition">@center($bulk->room->center)</a>
                <a href="{{ route('dashboard.rooms.show', $bulk->room->id) }}" class="block text-sm text-gray-600 hover:text-brand transition mt-1">@lang('Therapy room of :user', ['user' => $bulk->room->manager->name])</a href="#">
            </div>
            <a href="{{ route('dashboard.rooms.show', $bulk->room->id) }}" class="flex justify-center items-center flex-shrink-0 w-14 h-w-14 bg-gray-300 text-gray-600 text-xs rounded-full border-2 border-white overflow-hidden">
                <img src="@attachmentLink($bulk->room->manager->avatar, 'small')" class="w-full h-full object-cover object-center">
            </a>
        </div>
        <div class="flex flex-col border border-gray-300 rounded p-4">
            <h3 class="text-sm font-semibold text-gray-700 mb-2">لیست آزمون‌ها</h3>
            <div class="w-full max-h-24 overflow-y-auto bg-gray-100 rounded p-3">
                <ul class="samplesLogin-list">
                    @foreach ($bulk->scales as $scale)
                        <li>{{ $scale->title }}</li>
                    @endforeach
                </ul>
            </div>

            <span class="text-sm text-gray-600 mt-8">
                با اتمام این مرحله شما عضو مرکز درمانی و اتاق درمان بالا خواهید شد و مدیران قادر به دیدن شماره تماس شما می‌باشند؛ همچنین شما می‌توانید در قسمت پایین نام مستعاری برای خود در این مرکز تعریف کنید.
            </span>

            <span class="text-xs text-gray-600 mt-1">
                در این فرایند پرسش‌نامه‌های بالا برای شما فعال شده و شما می‌توانید آن‌ها را تکمیل کنید.
            </span>

            <div class="mt-4">
                <form action="">
                    <label for="nickname">{{ __('Nickname') }}</label>
                    <input type="text" class="w-full text-sm border border-gray-200 rounded-sm" id="nickname" name="nickname" value="{{ auth()->user()->name }}" placeholder="{{ __('Nickname') }}">
                    <button type="submit" class="w-full h-10 text-sm rounded-full bg-brand text-white hover:bg-brand-700 transition mt-4 focus">تأیید و ادامه</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('auth.theory')
