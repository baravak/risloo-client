@section('head-styles')
    <style class="bodyLoading">
        @keyframes bodyLoading{
            0% {
                opacity: 1;
            }
            100% {
                opacity: 0;
                display:none;
            }
        }
        body {
            overflow: hidden;
        }
        body::before {
            content: "";
            display: block;
            width: 100%;
            height: 100%;
            position: fixed;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            background-color: #007BA4;
            opacity: 1;
            z-index: 999;
        }
    </style>
    <link rel="stylesheet" href="@staticVersion('/css/davat.css')" media="print" onload="this.media='all'; this.onload = null">

    @if (false)
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
    @endif
@endsection
