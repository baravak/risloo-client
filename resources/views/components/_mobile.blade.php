@if (!empty($mobile))
    <a href="tel:+{{$mobile[2]}}{{$mobile[0]}}" class="direction-ltr text-left d-inline-block" target="_blank">
        <span class="d-none d-md-inline">
            <span class="d-none d-lg-inline">+{{$mobile[2]}}</span>{{$mobile[0]}}
        </span>
        <span class="d-lg-inline">
            <i class="fas fa-phone"></i>
        </span>
    </a>
@endif
