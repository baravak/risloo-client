<div class="mt-4">
    <label for="session_type" class="block mb-2 text-sm text-gray-700 font-medium">@lang('نوع جلسه')</label>
    <select id="session_type" name="session_type" class="border border-gray-500 h-10 rounded pl-4 pr-8 w-full text-sm focus:border-brand focus:outline-none focus:ring-2 focus:ring-offset-1 focus:ring-opacity-60">
        <option value="face_to_face" @selectChecked($session->session_type, 'face_to_face')>@lang('جلسه حضوری')</option>
        <option value="phone_call" @selectChecked($session->session_type, 'phone_call')>@lang('تماس تلفنی')</option>
        <option value="voice_call" @selectChecked($session->session_type, 'voice_call')>@lang('تماس صوتی آنلاین')</option>
        <option value="video_conference" @selectChecked($session->session_type, 'video_conference')>@lang('ویدئو کنفرانس')</option>
    </select>
</div>

<div class="mt-4">
    <label class="inline-flex items-center group">
        <input type="checkbox" id="ch-opens-at" class="w-3.5 h-3.5 border border-gray-600 rounded-sm focus:ring-1 focus:ring-offset-1">
        <span class="text-sm text-gray-600 mr-2 group-hover:text-blue-600">@lang('زمان شروع نوبت‌گیری')</span>
    </label>

    <label class="inline-flex items-center group mr-4" data-for="opens-at">
        <input  type="radio" id="opens-at-type-absolute" name="opens_at_type" value="absolute" class="w-3.5 h-3.5 border border-gray-600 focus:ring-1 focus:ring-offset-1">
        <span class="text-sm text-gray-600 mr-2 group-hover:text-blue-600">@lang('زمان دقیق')</span>
    </label>

    <label class="inline-flex items-center group mr-4" data-for="opens-at">
        <input  type="radio" checked id="opens-at-type-relative" name="opens_at_type" value="relative" class="w-3.5 h-3.5 border border-gray-600 focus:ring-1 focus:ring-offset-1">
        <span class="text-sm text-gray-600 mr-2 group-hover:text-blue-600">@lang('زمان نسبی')</span>
    </label>
</div>

<div data-for="opens-at">
    <div class="mt-4" data-for="relative">
        <input type="text" id="relative-opens-days" class="border border-gray-500 h-10 rounded px-4 w-14 text-sm focus:border-brand focus:outline-none focus:ring-2 focus:ring-offset-1 focus:ring-opacity-60 dir-ltr text-left">
        <span>روز</span>
        <span>و</span>
        <input type="text" id="relative-opens-hours" class="border border-gray-500 h-10 rounded px-4 w-14 text-sm focus:border-brand focus:outline-none focus:ring-2 focus:ring-offset-1 focus:ring-opacity-60 dir-ltr text-left">
        <span>ساعت</span>
        <span>و</span>
        <input type="text" id="relative-opens-minutes" class="border border-gray-500 h-10 rounded px-4 w-14 text-sm focus:border-brand focus:outline-none focus:ring-2 focus:ring-offset-1 focus:ring-opacity-60 dir-ltr text-left">
        <span>دقیقه</span>
        <span>قبل از زمان تشکیل جلسه</span>
        <input type="hidden" name="opens_at" id="relative-opens-at">
    </div>

    <div class="mt-4" data-for="absolute">
        <input type="text" readonly id="opens-at-picker" dpicker-time="true" data-picker-alt="opens-at" class="border border-gray-500 h-10 rounded px-4 w-full text-sm focus:border-brand focus:outline-none focus:ring-2 focus:ring-offset-1 focus:ring-opacity-60 date-picker dir-ltr text-left">
        <input type="hidden" name="opens_at" id="opens-at">
    </div>
</div>

<div class="mt-4">
    <label class="inline-flex items-center group">
        <input type="checkbox" id="ch-closed-at" class="w-3.5 h-3.5 border border-gray-600 rounded-sm focus:ring-1 focus:ring-offset-1">
        <span class="text-sm text-gray-600 mr-2 group-hover:text-blue-600">@lang('زمان بستن نوبت‌گیری')</span>
    </label>

    <label class="inline-flex items-center group mr-4" data-for="closed-at">
        <input  type="radio" id="closed-at-type-absolute" name="closed_at_type" value="absolute" class="w-3.5 h-3.5 border border-gray-600 focus:ring-1 focus:ring-offset-1">
        <span class="text-sm text-gray-600 mr-2 group-hover:text-blue-600">@lang('زمان دقیق')</span>
    </label>

    <label class="inline-flex items-center group mr-4" data-for="closed-at">
        <input  type="radio" checked id="closed-at-type-relative" name="closed_at_type" value="relative" class="w-3.5 h-3.5 border border-gray-600 focus:ring-1 focus:ring-offset-1">
        <span class="text-sm text-gray-600 mr-2 group-hover:text-blue-600">@lang('زمان نسبی')</span>
    </label>
</div>

<div data-for="closed-at">
    <div class="mt-4" data-for="relative">
        <input type="text" id="relative-closed-days" class="border border-gray-500 h-10 rounded px-4 w-14 text-sm focus:border-brand focus:outline-none focus:ring-2 focus:ring-offset-1 focus:ring-opacity-60 dir-ltr text-left">
        <span>روز</span>
        <span>و</span>
        <input type="text" id="relative-closed-hours" class="border border-gray-500 h-10 rounded px-4 w-14 text-sm focus:border-brand focus:outline-none focus:ring-2 focus:ring-offset-1 focus:ring-opacity-60 dir-ltr text-left">
        <span>ساعت</span>
        <span>و</span>
        <input type="text" id="relative-closed-minutes" class="border border-gray-500 h-10 rounded px-4 w-14 text-sm focus:border-brand focus:outline-none focus:ring-2 focus:ring-offset-1 focus:ring-opacity-60 dir-ltr text-left">
        <span>دقیقه</span>
        <span>قبل از زمان تشکیل جلسه</span>
        <input type="hidden" name="closed_at" id="relative-closed-at">
    </div>

    <div class="mt-4" data-for="absolute">
        <input type="text" readonly id="closed-at-picker" dpicker-time="true" data-picker-alt="closed-at" class="border border-gray-500 h-10 rounded px-4 w-full text-sm focus:border-brand focus:outline-none focus:ring-2 focus:ring-offset-1 focus:ring-opacity-60 date-picker dir-ltr text-left">
        <input type="hidden" name="closed_at" id="closed-at">
    </div>
</div>

<div class="mt-4">
    <label for="fields" class="inline-block mb-2 text-sm text-gray-700 font-medium">@lang('محور جلسه') <span class="text-xs text-gray-600 font-light mr-1" id="field_count"></span></label>
    <select class="select2-select placeholder-gray-300" data-tags="true" data-placeholder="@lang('فیلد را تایپ کنید و روی نوشته کلیک کنید یا دکمه تب را بزنید')" multiple name="fields[]" id="fields">
    @isset($session)
        @foreach ($session->fields as $field)
            <option value="{{ $field->title }}" selected data-amount="{{ $field->amount }}">{{ $field->title }}</option>
        @endforeach
    @endisset
    </select>
    <div class="flex items-center text-xs text-gray-400 mt-1">
        <i class="fal fa-info-circle ml-1"></i>
        <span>@lang('می‌توانید تعدادی از فیلدهای درمانی را ثبت کنید و در قسمت «پرداخت» برای هرکدام قیمتی مشخص کنید')</span>
    </div>
</div>

<div class="mt-4">
    <label for="description" class="inline-block mb-2 text-sm text-gray-700 font-medium">@lang('توضیحات')</label>
    <textarea type="text" id="description" name="description" class="border border-gray-500 placeholder-gray-300 h-20 rounded px-4 w-full text-sm focus:border-brand focus:outline-none focus:ring-2 focus:ring-offset-1 focus:ring-opacity-60 dir-ltr text-left">@isset($session){{ $session->description }}@endisset</textarea>
</div>
