@extends($layouts->dashboard)
@section('content')
    <div>
        <div class="mb-4 mt-8">
            <h2 class="heading" data-total="({{ $assessments->total() }})" data-xhr="total">{{ __('Assessments') }}</h2>
            {{-- <p class="text-xs text-gray-500 mt-2 pr-10">آزمون‌های روان‌شناختی موجود در سامانه را در این صفحه مشاهده می‌نمایید. این یک متن تستی می‌باشد جهت ارائه توضیحات یک صفحه که در زیر عنوان هر صفحه درج می‌شود.</p> --}}
        </div>

        <div class="mb-4">
            @include('layouts.quick_search')
        </div>
        @include('dashboard.assessments.list')
    </div>
@endsection