<h5>مقیاس‌های افزوده شده آزمون</h5>
<div class="row">
    @isset($sample->profiles->profile_hl_svg)
    <div class="col-12">
            <h6>مقیاس هریس لینگوز</h6>
            <img src="{{$sample->profiles->profile_hl_svg->url}}" class="d-block profile-hl-svg">
        </div>
        @endisset
</div>
