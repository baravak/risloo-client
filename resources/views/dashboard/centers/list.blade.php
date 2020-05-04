@if (false)
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>@sortView($centers, 'owner', __('Title'))</th>
                    {{-- <th>@sortView($centers, 'manager')</th> --}}
                    <th>{{__('Acception status')}}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($centers as $center)
                @include('dashboard.centers.listRaw')
                @endforeach
            </tbody>
        </table>
    </div>
@endif

<div class="row">
    @foreach ($centers as $center)
        <div class="col-xl-3">
            <div class="card mb-3">
                <div class="card-wall d-flex align-items-center px-3 border-bottom">
                    <div class="card-wall-media">
                        <a href="#" class="media media-primary rounded-circle">
                            <span>ح</span>
                        </a>
                    </div>
                    @isset($center->acception->position)
                        <div class="px-3 fs-12">شما <strong>{{__(ucfirst($center->acception->position))}}</strong> این مرکز درمانی هستید.</div>
                    @endisset
                </div>
                <div class="card-body">
                    
                    <div>
                        <a href="{{$center->owner->route('show')}}" class="text-decoration-none text-dark font-weight-bold fs-14">
                            @displayName($center->owner)
                        </a>
                    </div>
                    <div class="mb-3">
                        {!!$center->owner->type != 'psychologist' ? '<span class="fs-12">مدیر مرکز درمانی</span> <a href="" class="text-decoration-none text-dark font-weight-bold fs-12">دکتر جان‌بزرگی</a>' : '&nbsp;'!!}
                    </div>
                    <ul class="list-group">
                        <li class="list-group-item">
                            <i class="far fa-at ml-2"></i>
                            <a href="#" class="text-decoration-none text-dark fs-14">
                                username
                            </a>
                        </li>
                        <li class="list-group-item">
                            <i class="far fa-mobile ml-2"></i>
                            <a href="tel:+989121111111" class="fs-14 text-decoration-none text-dark">
                                +989121111111
                            </a>
                        </li>
                        <li class="list-group-item">
                            <i class="far fa-map-marker-alt ml-2"></i>
                            <address class="d-inline-block fs-14 mb-0">ایران، تهران، درب اول، پلاک یک</address>
                        </li>
                    </ul>
                    @if (false)
                        <span class="badge badge-light">{!!$center->owner->type == 'psychologist' ? '<span class="text-dark font-weight-bold fs-12"> '.__('Clinic').'</span>' : ''!!}</span>
                    @endif
                    <div>
                        @can('acception', $center)
                            @if ($center->allows('acception') == 'request')
                                <a href="{{route('dashboard.centers.request')}}" class="btn btn-block btn-sm btn-secondary mt-3" data-lijax="click" data-method="POST" data-name="center_id" data-value="{{$center->id}}">
                                    <i class="far fa-plug fs-12"></i> {{__('Acception request')}}
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
        </div>
    @endforeach
</div>
