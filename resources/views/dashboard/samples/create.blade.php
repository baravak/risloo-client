@extends('dashboard.create')
@section('form_content')
    <div>
        <label for="scale_id" data-alias="manager_id" class="block mb-2 text-sm text-gray-700 font-medium">{{ __('Scale') }}</label>
        <select class="select2-select" multiple name="scale_id[]" id="scale_id" data-url="{{ route('dashboard.assessments.index', ['instance' => 1]) }}" data-placeholder="جست‌و‌جو">
            @isset($scale)
                <option value="{{$scale->id}}" selected>{{$scale->title}}</option>
            @endisset
        </select>
        <div class="flex text-xs text-gray-400 mt-2">
            <i class="fal fa-info-circle ml-1"></i>
            <span>در این قسمت لیست آزمون‌های پُر کاربرد را مشاهده می‌کنید. جهت انتخاب آزمونی که در این لیست وجود ندارد، عنوان آزمون مد نظر را جست‌وجو کرده و آن را انتخاب نمایید. شما می‌توانید لیست تمام آزمون‌های موجود در سامانه را نیز در
                <a href="{{ route('dashboard.assessments.index') }}" data-metarget="assessments" data-metarget-pattern="^/dashboard/assessments.*" target="_blank" class="text-blue-600 hover:text-blue-800">این صفحه</a>
            مشاهده نمایید.
            </span>
        </div>
        @isset($scale)
        <div data-for="scale_id" class="hidden">
            @include('dashboard.assessments.select2', ['assessments' => [$scale]])
        </div>
        @endisset
    </div>

    <div class="mt-4">
        <label for="room_id" data-alias="manager_id" class="block mb-2 text-sm text-gray-700 font-medium">{{ __('Room') }}</label>
        <select class="select2-select" data-relation="case_id room_client_id bulk_case_id" name="room_id"  id="room_id" data-url="{{ route('dashboard.rooms.index' , ['my_management' => 1, 'instance' => 1]) }}">
        @isset($room)
            <option value="{{$room->id}}" selected>{{ $room->manager->name  }}</option>
        @endisset
        </select>
        @isset($room)
        <div data-for="room_id" class="hidden">
            @include('dashboard.rooms.select2', ['rooms' => [$room]])
        </div>
        @endisset
    </div>

    <div class="mt-4">
        <ul data-tabs>
            <li><a data-tabby-default href="#case-tab" class="focus direct" role="presentation">{{ __('Case') }}</a></li>
            <li><a href="#room-tab" class="focus direct" role="presentation">{{ __('Therapy room') }}</a></li>
            <li><a href="#bulk-tab" class="focus direct" role="presentation">{{ __('Bulk sample') }}</a></li>
        </ul>

        <div id="case-tab">
            @include('dashboard.samples.createCase')
        </div>

        <div id="room-tab">
            @include('dashboard.samples.createRoom')
        </div>

        <div id="bulk-tab">
            @include('dashboard.samples.createBulk')
        </div>
    </div>
    <div class="mt-4">
        <label for="psychologist_description" class="block mb-2 text-sm text-gray-700 font-medium">{{ __('Psychologist description') }}</label>
        <textarea id="psychologist_description" name="psychologist_description"  rows="5" class="resize-none border border-gray-500 rounded px-4 py-2 w-full text-sm placeholder-gray-300 focus:border-brand focus:outline-none focus:ring-2 focus:ring-offset-1 focus:ring-opacity-60"></textarea>
        <div class="flex text-xs text-gray-400 mt-2">
            <i class="fal fa-info-circle ml-1"></i>
            <span>
                در این قسمت شما می‌توانید توضیحاتی را اضافه بر توضیحات یک نمونه وارد کنید تا مراجع قبل از انجام نمونه(ها) این توضیحات را مشاهده کند
            </span>
        </div>
    </div>
@endsection
