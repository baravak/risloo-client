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

    <link rel="stylesheet" href="/vendors/tabby/css/tabby-ui.css">

    <link rel="stylesheet" href="@staticVersion('/css/davat.css')">

    <!-- Hotjar Tracking Code for risloo.ir -->
    @if (config('app.env') != 'local')
        <script>
            (function(h,o,t,j,a,r){
                h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
                h._hjSettings={hjid:2262407,hjsv:6};
                a=o.getElementsByTagName('head')[0];
                r=o.createElement('script');r.async=1;
                r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
                a.appendChild(r);
            })(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');
        </script>
    @endif
@endsection
