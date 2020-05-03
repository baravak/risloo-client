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
            <div class="card mb-3 h-100">
                <div style="position: relative">
                    <img src="{{ asset('images/wall.jpg') }}" alt="" class="w-100" style="border-top-right-radius: .25rem; border-top-left-radius: .25rem;">
                    <img src="{{ asset('images/avatar/user.png') }}" alt="" style="width: 50px; position: absolute; top: calc(50% - 25px); right: 15px;">
                </div>
                <div class="card-body">
                    <div>
                        <a href="{{$center->owner->route('show')}}" class="text-decoration-none text-dark font-weight-bold fs-14">
                            @displayName($center->owner)
                        </a>
                    </div>
                    <div>
                        {!!$center->owner->type != 'psychologist' ? '<span class="fs-12">مدیر مرکز درمانی</span> <a href="" class="text-decoration-none text-dark font-weight-bold fs-12">دکتر جان‌بزرگی</a>' : ''!!}
                    </div>
                    @if (false)
                        <span class="badge badge-light">{!!$center->owner->type == 'psychologist' ? '<span class="text-dark font-weight-bold fs-12"> '.__('Clinic').'</span>' : ''!!}</span>
                    @endif
                    <div>
                        @can('acception', $center)
                            @if ($center->allows('acception') == 'request')
                                <a href="{{route('dashboard.centers.request')}}" class="btn btn-sm btn-secondary mt-2" data-lijax="click" data-method="POST" data-name="center_id" data-value="{{$center->id}}">
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
                            @elseif($center->acception && $center->acception->accepted_at)
                                <span class="badge badge-light align-middle">
                                    <i class="far fa-badge-check text-primary fs-12 pt-1"></i>
                                    <span>{{__(ucfirst($center->acception->position))}}</span>
                                </span>
                            @endif
                        @endcan
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
