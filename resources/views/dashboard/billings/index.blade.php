@extends($layouts->dashboard)
@section('content')
    <div>
        <div class="flex justify-between items-center mt-8 mb-4">
            <div>
                <h2 class="heading" data-total="({{ $billings && $billings->total() ? $billings->total() : 0 }})" data-xhr="total">{{ __('Billings') }}</h2>
            </div>
            {{-- <div>
                <a href="#" class="flex justify-center items-center flex-shrink-0 border border-brand text-brand px-4 w-9 sm:w-auto h-9 rounded-full text-xs hover:bg-brand hover:text-white transition">
                    <i class="fal fa-filter"></i>
                    <span>{{ __('Pre-Billings') }}</span>
                </a>
            </div> --}}
            <div class="billings border border-brand rounded-full text-xs text-brand text-left dir-ltr">
                <a href="" class="inline-flex items-center justify-center py-2 pr-3 pl-4 rounded-tl-full rounded-bl-full active">{{ __('All') }}</a>
                <a href="" class="inline-flex items-center justify-center py-2 pr-4 pl-3 rounded-tr-full rounded-br-full">{{ __('Pre-Billings') }}</a>
            </div>
        </div>
        @include('dashboard.billings.list')
    </div>
@endsection
