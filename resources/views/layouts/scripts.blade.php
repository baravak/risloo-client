@section('scripts')
@parent
<script src="@staticVersion('/vendors/i18n/i18n.min.js')"></script>
<script src="@staticVersion('/js/lang/fa.js')"></script>
<script src="@staticVersion('/js/dashboard.min.js')"></script>
<script src="/vendors/jsEncrypt.js"></script>
<script src="/vendors/jsEncryptLong.js"></script>
@if (auth()->user() && auth()->user()->public_key)
    <script>
        const auth_public_key = `{{ auth()->user()->public_key }}`;
        const auth_private_key = ``;
    </script>
@endif
@endsection
@include('layouts._scripts')
