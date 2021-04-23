@extends($layouts->dashboard)
@section('content')
    <div>
        <div class="m-auto w-full md:w-1/2">
            <form method="POST" action="{{ route('dashboard.payments.sotre') }}">
                <div class="border border-gray-300 rounded p-4">
                    <h2 class="text-center variable-font-bold text-green-700 mb-4 cursor-default">{{ __('Increase credit') }}</h2>
                    <div>
                        <label for="treasury_id" class="block mb-2 text-sm text-gray-700 variable-font-medium">{{ __('Select treasury') }}</label>
                        <select id="treasury_id" name="treasury_id">
                            @foreach (auth()->user()->treasuries->where('symbol', '<>', 'gift')->where('creditable', true) as $treasury)
                                <option value="{{ $treasury->id }}">{{ $treasury->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mt-4">
                        <label for="amount" class="block mb-2 text-sm text-gray-700 variable-font-medium cursor-default">{{ __('Balance') }} <span class="text-xs text-gray-500 variable-font-normal">({{ __('Toman') }})</span></label>
                        <input type="number" name="amount" id="amount" autocomplete="off" class="border border-gray-500 h-10 rounded px-4 w-full text-sm text-left dir-ltr focus:border-brand focus">
                    </div>
                </div>
                <div class="mt-4">
                    <button type="submit" class="inline-flex justify-center items-center h-9 px-8 bg-brand text-white text-sm rounded-full hover:bg-brand-600 transition ml-4 focus" role="button">
                        {{ __('Transfer to payment gateway') }}
                    </button>
                </div>
            </form>
        </div>

        <div>
            <div class="mt-8 mb-4">
                <h2 class="heading" data-total="(8)" data-xhr="total">{{ __('Payments log') }}</h2>
            </div>
            @include('dashboard.payments.paymentsList')
        </div>
    </div>
@endsection
