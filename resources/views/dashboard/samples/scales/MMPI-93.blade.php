<div class="card-body" id="scoring-extends" data-xhr="scoring-extends">
    <div class="row">
        <div class="col-12 mb-2">
            <h5>مقیاس‌های افزوده شده آزمون</h5>
        </div>
    </div>
    <div class="row">
        <div class="col-6">
            <div class="row">
                <div class="col-4">
                    @isset($scoring->profiles->profile_nv_svg)
                        <h6>مقیاس‌های روایی جدید</h6>
                        <img src="{{$scoring->profiles->profile_nv_svg->url}}" class="d-block profile-nv-svg">
                    @endisset
                </div>
                <div class="col-8">
                    @isset($scoring->profiles->profile_critical_svg)
                        <h6>مقیاس‌های بحرانی</h6>
                        <img src="{{$scoring->profiles->profile_critical_svg->url}}" class="d-block profile-critical-svg">
                    @endisset
                </div>
            </div>
        </div>
        <div class="col-6">
            @isset($scoring->profiles->profile_sup_svg)
                <h6>مقیاس‌های تکمیلی</h6>
                <img src="{{$scoring->profiles->profile_sup_svg->url}}" class="d-block profile-sup-svg">
            @endisset
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            @isset($scoring->profiles->profile_hl_svg)
                <h6>مقیاس‌های هریس‌لینگوز</h6>
                <img src="{{$scoring->profiles->profile_hl_svg->url}}" class="d-block profile-hl-svg">
            @endisset
        </div>
    </div>
    <div class="row">
        <div class="col-5">
            @isset($scoring->profiles->profile_si_svg)
                <h6>مقیاس‌های Si</h6>
                <img src="{{$scoring->profiles->profile_si_svg->url}}" class="d-block profile-si-svg">
            @endisset
        </div>
        <div class="col-7">
            @isset($scoring->profiles->profile_content_svg)
                <h6>مقیاس‌های محتوایی</h6>
                <img src="{{$scoring->profiles->profile_content_svg->url}}" class="d-block profile-content-svg">
            @endisset
        </div>
    </div>
</div>
