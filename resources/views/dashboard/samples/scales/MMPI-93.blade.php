<div class="card-body" id="scoring-extends" data-xhr="scoring-extends">
    <div class="row">
    <h5>مقیاس‌های افزوده شده آزمون</h5>
        <div class="col-12" data-xhr="">
            @isset($scoring->profiles->profile_hl_svg)
                <h6>مقیاس هریس لینگوز</h6>
                <img src="{{$scoring->profiles->profile_hl_svg->url}}" class="d-block profile-hl-svg">
                @endisset
            </div>
    </div>
</div>
