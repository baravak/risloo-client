<div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-3" data-xhr="center-list-{{$center->id}}">
    <div class="card card-center mb-3 overflow-hidden">
        <div class="card-wall d-flex align-items-center px-3 border-bottom trianglify-{{$center->created_at->timestamp % 16}}">
            <div class="card-wall-media">
                <a href="#" class="media media-primary rounded-circle">
                    <span>
                        {{mb_substr($center->owner->name, 0, 2)}}
                    </span>
                </a>
            </div>
            <div class="px-3">
                <div>
                    <h6 class="font-weight-bolder">
                        <a href="{{$center->owner->route('show')}}" class="text-decoration-none text-dark">
                            @displayName($center->owner)
                        </a>
                    </h6>
                </div>
                <div>
                    @isset($center->acception->position)
                        <div class="fs-10">شما <strong>{{__(ucfirst($center->acception->position))}}</strong> این مرکز درمانی هستید</div>
                    @endisset
                    @can('acception', $center)
                        @if ($center->allows('acception') == 'request')
                            <a href="{{route('dashboard.centers.request')}}" class="btn btn-sm btn-primary fs-10" data-lijax="click" data-method="POST" data-name="center_id" data-value="{{$center->id}}">
                                {{__('Acception request')}}
                            </a>
                        @elseif($center->allows('acception') == 'accept')
                            <a href="{{route('dashboard.centers.accept')}}" class="badge badge-success fs-10" data-lijax="click" data-method="POST" data-name="center_id" data-value="{{$center->id}}">
                                <i class="far fa-badge-check fs-12"></i> {{__('Accept')}}
                            </a>
                        @endif
                    @else
                        @if ($center->acception && $center->acception->kicked_at)
                            <i class="far fa-minus-circle text-muted fs-12"></i> <span class="text-muted">{{__('Kicked')}}</span>
                        @elseif($center->acception && !$center->acception->accepted_at)
                            <span class="fs-10">
                                {{__('Awaiting')}}
                            </span>
                        @endif
                    @endcan
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-7">
                    <i class="far fa-map-marker-alt fs-12"></i> <address class="d-inline fs-12 mb-0">ایران، تهران، درب اول، پلاک یک</address>
                </div>
                <div class="col-5 text-left direction-ltr">
                    <div>
                        <div>
                            <i class="far fa-at fs-12"></i>
                            <a href="#" class="text-decoration-none text-dark fs-14">
                                {{$center->owner->username}}
                            </a>
                        </div>
                        <div>
                            <i class="far fa-mobile fs-12"></i>
                            <a href="tel:+989121111111" class="fs-14 text-decoration-none text-dark">
                                {{$center->owner->mobile ?: '-'}}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
