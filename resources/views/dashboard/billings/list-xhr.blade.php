<h2 class="heading" data-total="({{ $billings && $billings->count() ? $billings->total() : 0 }})" data-xhr="total">{{ __('Billings') }}</h2>
@include('dashboard.billings.list')
