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

        body::after {
            content: url("data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZpZXdCb3g9IjAgMCA1MTIgNTEyIj48cGF0aCBmaWxsPSIjZmZmIiBkPSJNNDYwLjExNSAzNzMuODQ2bC02Ljk0MS00LjAwOGMtNS41NDYtMy4yMDItNy41NjQtMTAuMTc3LTQuNjYxLTE1Ljg4NiAzMi45NzEtNjQuODM4IDMxLjE2Ny0xNDIuNzMxLTUuNDE1LTIwNS45NTQtMzYuNTA0LTYzLjM1Ni0xMDMuMTE4LTEwMy44NzYtMTc1LjgtMTA3LjcwMUMyNjAuOTUyIDM5Ljk2MyAyNTYgMzQuNjc2IDI1NiAyOC4zMjF2LTguMDEyYzAtNi45MDQgNS44MDgtMTIuMzM3IDEyLjcwMy0xMS45ODIgODMuNTUyIDQuMzA2IDE2MC4xNTcgNTAuODYxIDIwMi4xMDYgMTIzLjY3IDQyLjA2OSA3Mi43MDMgNDQuMDgzIDE2Mi4zMjIgNi4wMzQgMjM2LjgzOC0zLjE0IDYuMTQ5LTEwLjc1IDguNDYyLTE2LjcyOCA1LjAxMXoiLz48L3N2Zz4=");
            position: absolute;
            width: 1rem;
            height: 1rem;
            top: calc(50% - .5rem);
            right: calc(50% - .5rem);
            z-index: 9999;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            from {
                transform: rotate(0deg);
            }
            to {
                transform: rotate(360deg);
            }
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
