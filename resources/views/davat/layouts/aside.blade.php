@section('aside')
    <aside id="aside" class="bg-gray-50 border-l border-gray-200 overflow-y-auto">
        <div class="flex items-center h-20 px-2">
            <h1 class="text-2xl font-black text-brand">
                <a href="/" target="_blank" class="block">{{ __('App Title') }}</a>
            </h1>
        </div>

        <ul class="px-2">
            <li class="mb-1">
                <a href="{{ route('dashboard.home') }}" data-metarget-default class="flex justify-between items-center h-12 px-6 rounded text-gray-900 hover:bg-gray-200 transition">
                    <div class="flex items-center">
                        <i class="fal fa-tachometer-alt-fastest ml-2"></i>
                        <span class="font-light">{{ __('Dashboard') }}</span>
                    </div>
                </a>
            </li>
            <li class="mb-1">
                <a href="{{ route('dashboard.centers.index') }}" data-metarget="centers-index" class="flex justify-between items-center h-12 px-6 rounded text-gray-900 hover:bg-gray-200 transition">
                    <div class="flex items-center">
                        <i class="fal fa-building ml-2"></i>
                        <span class="font-light">{{ __('Therapy centers') }}</span>
                    </div>
                </a>
                <ul class="pr-8 mt-2">
                    @if (auth()->myClinic())
                    <li>
                        <a href="{{ route('dashboard.centers.show', auth()->myClinic()->id) }}" data-metarget="centers-myclinic" data-metarget-pattern="/dashboard/centers/{{ auth()->myClinic()->id }}.*" class="flex items-center text-sm text-gray-600 h-12 pr-4 border-r border-gray-300 hover:text-gray-800 transition">{{  __('My clinic') }}</a>
                    </li>
                    @endif
                    @php
                        $_AsideCenter= auth()->centers(true);
                    @endphp
                    @if ($_AsideCenter->count() < 3)
                        @foreach ($_AsideCenter as $_center)
                        <li>
                            <a href="{{ route('dashboard.centers.show', $_center->id) }}"data-metarget="centers-myclinic-{{ $_center->id }}" data-metarget-pattern="/dashboard/centers/{{ $_center->id}}.*" class="flex items-center text-sm text-gray-600 h-12 pr-4 border-r border-gray-300 hover:text-gray-800 transition">
                                @if ($_center->type == 'personal_clinic')
                                    @lang('Personal clinic of :user', ['user' => $_center->manager->name])
                                @else
                                {{ $_center->detail->title }}
                                @endif
                            </a>
                        </li>
                        @endforeach
                    @else
                        <li>
                            <a href="{{ route('dashboard.centers.index', ['my' => 'yes']) }}" data-metarget="centers-myclinics" class="flex items-center text-sm text-gray-600 h-12 pr-4 border-r border-gray-300 hover:text-gray-800 transition">{{  __('My therapy centers') }}</a>
                        </li>
                    @endif
                </ul>
            </li>
            @if (false)
                <li class="mb-1">
                    <a href="{{ route('dashboard.rooms.index') }}" data-metarget="rooms" data-metarget-pattern="^/dashboard/rooms.*" class="flex justify-between items-center h-12 px-6 rounded text-gray-900 hover:bg-gray-200 transition">
                        <div class="flex items-center">
                            <i class="fal fa-door-open ml-2"></i>
                            <span class="font-light">{{ __('Rooms') }}</span>
                        </div>
                    </a>
                </li>
                <li class="mb-1">
                    <a href="{{ route('dashboard.cases.index') }}" data-metarget="cases" data-metarget-pattern="^/dashboard/cases.*" class="flex justify-between items-center h-12 px-6 rounded text-gray-900 hover:bg-gray-200 transition">
                        <div class="flex items-center">
                            <i class="fal fa-folders ml-2"></i>
                            <span class="font-light">{{ __('Cases') }}</span>
                        </div>
                    </a>
                </li>
            @endif
            <li class="mb-1">
                <a href="{{ route('dashboard.sessions.index') }}" data-metarget="session" data-metarget-pattern="^/dashboard/session.*" class="flex justify-between items-center h-12 px-6 rounded text-gray-900 hover:bg-gray-200 transition">
                    <div class="flex items-center">
                        <i class="fal fa-user-friends ml-2"></i>
                        <span class="font-light">{{ __('Sessions') }}</span>
                    </div>
                </a>
            </li>
            @if (auth()->isAdmin())
            <li class="mb-1">
                <a href="{{ route('dashboard.users.index') }}" data-metarget="users" data-metarget-pattern="^/dashboard/users.*" class="flex justify-between items-center h-12 px-6 rounded text-gray-900 hover:bg-gray-200 transition">
                    <div class="flex items-center">
                        <i class="fal fa-users ml-2"></i>
                        <span class="font-light">{{ __('Users') }}</span>
                    </div>
                </a>
            </li>
            @endif
            <li class="mb-1">
                <a href="{{ route('dashboard.assessments.index') }}" data-metarget="assessments" data-metarget-pattern="^/dashboard/assessments.*" class="flex justify-between items-center h-12 px-6 rounded text-gray-900 hover:bg-gray-200 transition">
                    <div class="flex items-center">
                        <i class="fal fa-balance-scale ml-2"></i>
                        <span class="font-light">{{ __('Assessments') }}</span>
                    </div>
                </a>
            </li>
            <li class="mb-1">
                <a href="{{ route('dashboard.samples.index') }}" data-metarget="samples" data-metarget-pattern="^/dashboard/samples.*" class="flex justify-between items-center h-12 px-6 rounded text-gray-900 hover:bg-gray-200 transition">
                    <div class="flex items-center">
                        <i class="fal fa-vial ml-2"></i>
                        <span class="font-light">{{ __('Samples') }}</span>
                    </div>
                </a>
                <ul class="pr-8 mt-2">
                    <li>
                        <a href="" data-metarget="samples-my" data-metarget-pattern="" class="flex items-center text-sm text-gray-600 h-12 pr-4 border-r border-gray-300 hover:text-gray-800 transition">@lang('Bulk samples')</a>
                    </li>
                </ul>
            </li>
            @if (false)
                <li class="mb-1">
                    <a href="{{ route('dashboard.documents.index') }}" data-metarget="samples" data-metarget-pattern="^/dashboard/documents.*" class="flex justify-between items-center h-12 px-6 rounded text-gray-900 hover:bg-gray-200 transition">
                        <div class="flex items-center">
                            <i class="fal fa-file-certificate ml-2"></i>
                            <span class="font-light">{{ __('Documents') }}</span>
                        </div>
                    </a>
                </li>
            @endif
            @isset($layouts->asideMenu)
                @include($layouts->asideMenu)
            @endisset
        </ul>
    </aside>
@endsection
