@section('scripts')
    <script src="/vendors/jquery-3.4.1.min.js"></script>
    @if ($layouts->vendor->popper)
        <script src="/vendors/popper.min.js"></script>
    @endif
    @if ($layouts->vendor->select2)
        <script src="/vendors/select2-4.1.0-rc.0/dist/js/select2.min.js"></script>
    @endif
    @if ($layouts->vendor->iziToast)
        <script src="/vendors/iziToast/dist/js/iziToast.min.js"></script>
    @endif
    @if ($layouts->vendor->persian_datepicker)
        <script src="/vendors/persian-date/persian-date.min.js"></script>
        <script src="/vendors/persian-datepicker/js/persian-datepicker.min.js"></script>
    @endif

    @if ($layouts->vendor->amcharts4)
        <script src="/vendors/amcharts4/core.js"></script>
        <script src="/vendors/amcharts4/charts.js"></script>
        <script src="/vendors/amcharts4/themes/amcharts.js"></script>
        <script src="/vendors/amcharts4/lang/en.js"></script>
    @endif

    <!-- Hotjar Tracking Code for risloo.ir -->
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

    <script src="@staticVersion('/js/sarkoot.min.js')"></script>

    <script src="@staticVersion('/js/app.js')"></script>

    <script src="@staticVersion('/js/davat.js')"></script>
@endsection