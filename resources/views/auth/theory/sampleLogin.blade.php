@include('layouts.head-styles')
@include('layouts.head')

@section('main')
<div class="flex-1 flex justify-center items-center bg-gray-50">
    <div class="w-full sm:w-96 mx-4 sm:mx-auto">
        <div class="flex justify-between items-center border border-gray-300 rounded p-4 mb-2">
            <a href="#" class="flex justify-center items-center flex-shrink-0 w-14 h-w-14 bg-gray-300 text-gray-600 text-xs rounded-full border-2 border-white overflow-hidden">
                <img src="https://bapi.risloo.ir/storage/public/Files_1000/P96666DR_small.png" class="w-full h-full object-cover object-center">
            </a>
            <div class="text-center px-2">
                <a href="#" class="block font-semibold text-gray-800 hover:text-brand transition">مرکز مشاوره ریسلوی ما</a>
                <a href="#" class="block text-sm text-gray-600 hover:text-brand transition mt-1">اتاق درمان محمدعلی نخلی</a href="#">
            </div>
            <a href="#" class="flex justify-center items-center flex-shrink-0 w-14 h-w-14 bg-gray-300 text-gray-600 text-xs rounded-full border-2 border-white overflow-hidden">
                <img src="https://bapi.risloo.ir/storage/public/Files_1000/P96666D7_small.png" class="w-full h-full object-cover object-center">
            </a>
        </div>
        <div class="flex flex-col border border-gray-300 rounded p-4">
            <h3 class="text-sm font-semibold text-gray-700 mb-2">لیست آزمون‌ها</h3>
            <div class="w-full max-h-24 overflow-y-auto bg-gray-100 rounded p-3">
                <ul class="samplesLogin-list">
                    <li>آزمون ذهنیّت یانگ (YMQ)</li>
                    <li>پرسشنامه 16 عاملی شخصیت کتل</li>
                    <li>آزمون ریون کودکان</li>
                    <li>آزمون سلامت عمومی</li>
                </ul>
            </div>

            <span class="text-sm text-gray-600 mt-8">{{ __("At the end of this step, your personal details will be visible to the managers of therapy centers and therapy rooms.") }}</span>

            <div class="mt-4">
                <form action="">
                    <input type="text" class="w-full text-sm border border-gray-200 rounded-sm" id="nickname" name="nickname" placeholder="{{ __('Nickname') }}">
                    <button class="w-full h-10 text-sm rounded-full bg-brand text-white hover:bg-brand-700 transition mt-4 focus">تأیید و ادامه</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@include('layouts.scripts')
@include('layouts.body')
@extends('layouts.app')