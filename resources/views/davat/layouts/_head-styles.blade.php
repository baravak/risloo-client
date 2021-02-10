@section('head-styles')
    @if ($layouts->vendor->fontawesome)
        <link rel="stylesheet" href="/vendors/fontawesome-5.15.1/css/all.min.css">
    @endif

    @if ($layouts->vendor->select2)
        <link rel="stylesheet" href="/vendors/select2-4.1.0-rc.0/dist/css/select2.min.css">
    @endif

    @if ($layouts->vendor->iziToast)
        <link rel="stylesheet" href="/vendors/iziToast/dist/css/iziToast.min.css">
    @endif

    @if ($layouts->vendor->persian_datepicker)
        <link rel="stylesheet" href="/vendors/persian-datepicker/css/persian-datepicker.min.css">
    @endif

    <link rel="stylesheet" href="@staticVersion('/css/davat.css')">
@endsection