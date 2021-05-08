<div class="mt-4">
    <label for="session_type" class="block mb-2 text-sm text-gray-700 font-medium">@lang('نوع جلسه')</label>
    <select id="session_type" name="session_type" class="border border-gray-500 h-10 rounded pl-4 pr-8 w-full text-sm focus:border-brand focus:outline-none focus:ring-2 focus:ring-offset-1 focus:ring-opacity-60">
        <option value="face_to_face" @selectChecked($session->type, 'face_to_face')>@lang('جلسه حضوری')</option>
        <option value="phone_call" @selectChecked($session->type, 'phone_call')>@lang('تماس تلفنی')</option>
        <option value="voice_call" @selectChecked($session->type, 'voice_call')>@lang('تماس صوتی آنلاین')</option>
        <option value="video_conference" @selectChecked($session->type, 'video_conference')>@lang('ویدئو کنفرانس')</option>
        <option value="selective" @selectChecked($session->type, 'selective')>@lang('انتخاب به عهده مراجع')</option>
    </select>
</div>

<div class="mt-4">
    <label for="status" class="block mb-2 text-sm text-gray-700 font-medium">@lang('وضعیت جلسه')</label>
    <select id="session_status" name="status" class="border border-gray-500 h-10 rounded pl-4 pr-8 w-full text-sm focus:border-brand focus:outline-none focus:ring-2 focus:ring-offset-1 focus:ring-opacity-60">
        <option value="draft" @selectChecked($session->status, 'draft')>@lang('Draft')</option>
        <option value="registration_awaiting" @selectChecked($session->status, 'registration_awaiting')  @selectChecked($session->status, 'awaiting')>@lang('زمان‌بندی شده')</option>
        <option value="client_awaiting" @selectChecked($session->status, 'client_awaiting')>@lang('client_awaiting')</option>
        <option value="session_awaiting" @selectChecked($session->status, 'session_awaiting')>@lang('session_awaiting')</option>
        <option value="in_session" @selectChecked($session->status, 'in_session')>@lang('in_session')</option>
        <option value="finished" @selectChecked($session->status, 'finished')>@lang('finished')</option>
        <option value="canceled_by_client" @selectChecked($session->status, 'canceled_by_client')>@lang('canceled_by_client')</option>
        <option value="canceled_by_center" @selectChecked($session->status, 'canceled_by_center')>@lang('canceled_by_center')</option>
    </select>
</div>
<div id="open-awaiting-elements">
    <div class="mt-4">
        <label class="inline-flex items-center group">
            <input type="checkbox" id="ch-opens-at" class="w-3.5 h-3.5 border border-gray-600 rounded-sm focus:ring-1 focus:ring-offset-1 hidden">
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
            <input type="text" id="relative-opens-days" class="border border-gray-500 h-10 rounded px-4 w-14 text-sm focus:border-brand focus:outline-none focus:ring-2 focus:ring-offset-1 focus:ring-opacity-60 dir-ltr text-left" value="{{ isset($session) ? $session->opens_relative_days : null }}">
            <span>روز</span>
            <span>و</span>
            <input type="text" id="relative-opens-hours" class="border border-gray-500 h-10 rounded px-4 w-14 text-sm focus:border-brand focus:outline-none focus:ring-2 focus:ring-offset-1 focus:ring-opacity-60 dir-ltr text-left" value="{{ isset($session) ? $session->opens_relative_hours : null }}">
            <span>ساعت</span>
            <span>و</span>
            <input type="text" id="relative-opens-minutes" class="border border-gray-500 h-10 rounded px-4 w-14 text-sm focus:border-brand focus:outline-none focus:ring-2 focus:ring-offset-1 focus:ring-opacity-60 dir-ltr text-left" value="{{ isset($session) ? $session->opens_relative_minutes : null }}">
            <span>دقیقه</span>
            <span>قبل از زمان تشکیل جلسه</span>
            <input type="hidden" name="opens_at" id="relative-opens-at">
        </div>

        <div class="mt-4" data-for="absolute">
            <input type="text" readonly id="opens-at-picker" dpicker-time="true" data-picker-alt="absolute-opens-at" class="border border-gray-500 h-10 rounded px-4 w-full text-sm focus:border-brand focus:outline-none focus:ring-2 focus:ring-offset-1 focus:ring-opacity-60 date-picker dir-ltr text-left" value="{{ isset($session->opens_at) ? $session->opens_at->timestamp : null  }}">
            <input type="hidden" name="opens_at" id="absolute-opens-at">
        </div>
    </div>

    <div class="mt-4">
        <label class="inline-flex items-center group">
            <input type="checkbox" id="ch-closed-at" class="w-3.5 h-3.5 border border-gray-600 rounded-sm focus:ring-1 focus:ring-offset-1" @isset($session->closed_at) checked @endisset>
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
            <input type="text" id="relative-closed-days" class="border border-gray-500 h-10 rounded px-4 w-14 text-sm focus:border-brand focus:outline-none focus:ring-2 focus:ring-offset-1 focus:ring-opacity-60 dir-ltr text-left" value="{{ isset($session) ? $session->closed_relative_days : null }}">
            <span>روز</span>
            <span>و</span>
            <input type="text" id="relative-closed-hours" class="border border-gray-500 h-10 rounded px-4 w-14 text-sm focus:border-brand focus:outline-none focus:ring-2 focus:ring-offset-1 focus:ring-opacity-60 dir-ltr text-left" value="{{ isset($session) ? $session->closed_relative_hours : null }}">
            <span>ساعت</span>
            <span>و</span>
            <input type="text" id="relative-closed-minutes" class="border border-gray-500 h-10 rounded px-4 w-14 text-sm focus:border-brand focus:outline-none focus:ring-2 focus:ring-offset-1 focus:ring-opacity-60 dir-ltr text-left" value="{{ isset($session) ? $session->closed_relative_minutes : null }}">
            <span>دقیقه</span>
            <span>قبل از زمان تشکیل جلسه</span>
            <input type="hidden" name="closed_at" id="relative-closed-at">
        </div>

        <div class="mt-4" data-for="absolute">
            <input type="text" readonly id="closed-at-picker" dpicker-time="true" data-picker-alt="absolute-closed-at" class="border border-gray-500 h-10 rounded px-4 w-full text-sm focus:border-brand focus:outline-none focus:ring-2 focus:ring-offset-1 focus:ring-opacity-60 date-picker dir-ltr text-left" value="{{ isset($session->closed_at) ? $session->closed_at->timestamp : null  }}">
            <input type="hidden" name="closed_at" id="absolute-closed-at">
        </div>
    </div>
</div>


@if (!isset($session))
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
@endif

<div class="mt-4">
    <label for="description" class="inline-block mb-2 text-sm text-gray-700 font-medium">@lang('توضیحات')</label>
    <textarea type="text" id="description" name="description" class="border border-gray-500 placeholder-gray-300 h-20 rounded px-4 w-full text-sm focus:border-brand focus:outline-none focus:ring-2 focus:ring-offset-1 focus:ring-opacity-60">@isset($session){{ $session->description }}@endisset</textarea>
</div>

<div class="mt-4">
    <label for="client_reminder" class="inline-block mb-2 text-sm text-gray-700 font-medium">@lang('پیغام یادآوری و هماهنگی مراجع')</label>
    <textarea type="text" id="client_reminder" name="client_reminder" class="border border-gray-500 placeholder-gray-300 h-20 rounded px-4 w-full text-sm focus:border-brand focus:outline-none focus:ring-2 focus:ring-offset-1 focus:ring-opacity-60">@isset($session){{ $session->client_reminder }}@endisset</textarea>
    <div class="flex text-xs text-gray-400 mt-2">
        <i class="fal fa-info-circle ml-1"></i>
        <span>شما می‌توانید در این قسمت توضیحاتی را وارد کنید که قصد دارید همراه با پیغام یادآوری مراجع برای او ارسال شود؛ مثلا لینک جلسه آنلاین، شماره تلفن جلسه تلفنی و ...</span>
    </div>
</div>
