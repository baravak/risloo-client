@extends('dashboard.create')
@section('form_content')
    <div class="mt-4">
        <label for="title" class="block mb-2 text-sm text-gray-700 font-medium">{{ __('Title') }}</label>
        <input type="text" name="title" id="title" autocomplete="off" @formValue($practice->title) class="border border-gray-500 h-10 rounded px-4 w-full text-sm focus:border-brand focus:outline-none focus:ring-2 focus:ring-offset-1 focus:ring-opacity-60">
    </div>

    <div class="mt-4">
        <label for="content" class="block mb-2 text-sm text-gray-700 font-medium">{{ __('Content') }}</label>
        <textarea id="content" name="content" autocomplete="off" @formValue($practice->content) class="resize-none border border-gray-500 h-24 rounded px-4 py-2 w-full text-sm placeholder-gray-300 focus:border-brand focus:outline-none focus:ring-2 focus:ring-offset-1 focus:ring-opacity-60"></textarea>
    </div>

    <div class="mt-4">
        <label for="attachment" class="block mb-2 text-sm text-gray-700 font-medium">{{ __('Attachment') }}</label>
        <input type="file" name="attachment" id="attachment" autocomplete="off">
    </div>
@endsection
