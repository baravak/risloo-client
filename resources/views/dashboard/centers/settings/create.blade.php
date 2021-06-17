@extends('dashboard.create')
@section('form_action'){{ route('dashboard.center.setting.session-platforms.store', $center->id) }}@endsection
@section('form_content')
        <div class="flex justify-end items-center mb-4">
            <div class="relative inline-block w-8 mr-2 align-middle select-none transition ease-in-out duration-700">
                <input checked type="checkbox" name="available" id="available" class="toggle-checkbox absolute block w-4 h-4 rounded-full bg-white border-4 appearance-none cursor-pointer"/>
                <label for="available" class="toggle-label block overflow-hidden h-4 rounded-full bg-gray-300 cursor-pointer"></label>
            </div>
        </div>
        <div>
            <div class="flex mb-2 relative">
                <input type="text" name="title" id="title" placeholder="@lang('Title')" class="flex-1 border border-gray-500 h-10 rounded px-4 pl-32 w-full text-sm focus:border-brand focus placeholder-gray-400">
                <select name="type" id="type" class="absolute left-1 top-1 bg-gray-100 border-gray-100 h-8 rounded text-xs focus:ring-1 focus:ring-offset-0 w-28">
                    <option disabled selected>نوع جلسه</option>
                    <option value="face-to-face">حضوری</option>
                    <option value="virtual">غیرحضوری</option>
                </select>
            </div>
            <div class="flex relative">
                <input type="text" name="identifier" id="identifier" placeholder="آدرس اینترنتی، شماره تماس یا متن را وارد نمایید" class="flex-1 border border-gray-500 h-10 rounded px-4 pl-32 w-full text-sm focus:border-brand focus placeholder-gray-400">
                <select name="identifier_type" id="identifier_type" class="absolute left-1 top-1 bg-gray-100 border-gray-100 h-8 rounded text-xs focus:ring-1 focus:ring-offset-0 w-28">
                    <option disabled selected>نوع مقدار</option>
                    <option value="uri">آدرس اینترنتی</option>
                    <option value="phone">شماره تماس</option>
                    <option value="string">متن</option>
                </select>
            </div>
        </div>
        <div class="mt-4">
            <label class="inline-flex items-start group">
                <input type="checkbox" name="selected" id="selected" value="1" class="w-3.5 h-3.5 border border-gray-600 rounded-sm focus:ring-1 focus:ring-offset-1">
                <span class="text-xs text-gray-500 mr-2 group-hover:text-blue-600">@lang('به صورت پیشفرض در ساخت جلسه درمانی انتخاب شود.')</span>
            </label>
        </div>
@endsection
