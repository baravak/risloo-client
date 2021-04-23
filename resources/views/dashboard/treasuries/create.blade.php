@extends('dashboard.create')
@section('form_content')
    <div>
        <div>
            <label for="title" class="block mb-2 text-sm text-gray-700 variable-font-medium">{{ __('Title') }}</label>
            <input type="text" name="title" id="title" autocomplete="off" @formValue($treasury->title) class="border border-gray-500 h-10 rounded px-4 w-full text-sm focus:border-brand focus" placeholder="عنوان کیف پول">
            <div class="flex items-center text-xs text-gray-400 mt-2">
                <i class="fal fa-info-circle ml-1"></i>
                <span>عنوان کیف پولی که دارید را وارد کنید؛ مثلا صندوق نقدی مرکز، حساب جناب دکتر...</span>
            </div>
        </div>
        @if (!isset($treasury) && auth()->user()->centers && auth()->user()->centers->where('manager.user_id', auth()->id())->count())
        <div class="mt-4">
            <label for="region_id" class="block mb-2 text-sm text-gray-700 font-medium">@lang('بستر')</label>
            <select id="region_id" name="region_id" class="border border-gray-500 h-10 rounded pl-4 pr-8 w-full text-sm focus:border-brand focus:outline-none focus:ring-2 focus:ring-offset-1 focus:ring-opacity-60">
                <option value="">@lang('شخصی')</option>
                @foreach (auth()->user()->centers->where('manager.user_id', auth()->id()) as $center)
                <option value="{{ $center->id }}">
                    @center($center)
                </option>
                @endforeach
            </select>
        </div>
        @endif
    </div>
@endsection
