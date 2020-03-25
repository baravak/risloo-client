@if ($user->type == 'client')
    <a href="{{route('dashboard.samples.create', ['client' => $user->id])}}" title="{{__('Create sample')}}" class="dropdown-item fs-12">
        <i class="fas fa-flask text-primary"></i> {{__('Create sample')}}
    </a>
@endif
