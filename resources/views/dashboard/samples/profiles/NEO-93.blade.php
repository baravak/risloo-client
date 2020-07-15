<style>
    .group{
        height: 20cm;
    }
</style>
<div class="page" id="profile">
    @includeWhen(request()->has('single'), 'dashboard.samples.profiles.top-header')
    <div class="row">
        <div class="col-12 group m-4">
            <img src="{{route('dashboard.samples.profile.svg', $sample->id)}}" alt="" width="100%" height="100%">
        </div>
    </div>
</div>
