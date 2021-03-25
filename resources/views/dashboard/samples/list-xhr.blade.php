<h3 class="heading" data-total="({{ $samples ? $samples->total() : 0 }})" data-xhr="total">{{ __('Samples') }}</h3>
@include('dashboard.samples.list')
