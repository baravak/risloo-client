@section('scripts')
    <script src="/vendors/jquery-3.6.0.min.js"></script>
    @if ($layouts->vendor->popper)
        <script src="/vendors/popper.min.js"></script>
    @endif

    <script src="@staticVersion('/js/sarkoot.min.js')"></script>

    <script src="@staticVersion('/js/davat.dashboard.min.js')"></script>
@endsection
