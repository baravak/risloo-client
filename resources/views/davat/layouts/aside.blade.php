@section('aside')
    <aside id="aside" class="bg-gray-50 border-l border-gray-200 overflow-y-auto">
        <div class="flex items-center h-20 px-2">
            <h1 class="text-2xl variable-font-black text-brand">
                <a href="/" target="_blank" class="block">{{ __('App Title') }}</a>
            </h1>
        </div>

        <ul class="px-2">
            <li class="mb-1">
                {{-- <a href="{{ route('dashboard.home') }}" data-metarget-default class="flex justify-between items-center h-12 px-6 rounded text-gray-900 hover:bg-gray-200 transition">
                    <div class="flex items-center">
                        <i class="fal fa-tachometer-alt-fastest ml-2"></i>
                        <span class="variable-font-light pt-1">{{ __('Dashboard') }}</span>
                    </div>
                </a> --}}
                <a href="{{ route('dashboard.home') }}" data-metarget-default class="flex justify-between items-center h-12 px-6 rounded text-gray-900 hover:bg-gray-200 transition">
                    <div class="flex items-center">
                        <i class="fal fa-tachometer-alt-fastest ml-3"></i>
                        <div>
                            <div class="variable-font-medium">{{ __('Dashboard') }}</div>
                            <div class="text-xs variable-font-light">خلاصه‌ای از سرویس</div>
                        </div>
                    </div>
                </a>
            </li>
            <li class="mb-1">
                <a href="{{ route('dashboard.centers.index') }}" data-metarget="centers-index" class="flex justify-between items-center h-12 px-6 rounded text-gray-900 hover:bg-gray-200 transition">
                    <div class="flex items-center">
                        <i class="fal fa-building ml-3"></i>
                        <div>
                            <div class="variable-font-medium">{{ __('Therapy centers') }}</div>
                            <div class="text-xs variable-font-light">لیست مراکز درمانی</div>
                        </div>
                    </div>
                </a>

                @if (auth()->myClinic())
                    <ul class="pr-8 mt-2">
                        <li>
                            <a href="{{ route('dashboard.rooms.show', auth()->myClinic()->id) }}" data-metarget="centers-myclinic" data-metarget-pattern="/dashboard/rooms/{{ auth()->myClinic()->id }}.*" class="flex items-center text-sm text-gray-600 h-12 pr-4 border-r border-gray-300 hover:text-gray-800 transition">{{  __('My clinic') }}</a>
                        </li>
                    </ul>
                @endif
                @php
                    $_AsideCenter= auth()->centers(true);
                @endphp
                @if ($_AsideCenter->count())
                    @if ($_AsideCenter->count() < 3)
                    <ul class="pr-8 mt-2">
                        @foreach ($_AsideCenter as $_center)
                        <li>
                            <a href="{{ route('dashboard.' . ($_center->type =='personal_clinic' ? 'rooms' : 'centers') . '.show', $_center->id) }}"data-metarget="centers-myclinic-{{ $_center->id }}" data-metarget-pattern="/dashboard/{{ $_center->type =='personal_clinic' ? 'rooms' : 'centers' }}/{{ $_center->id}}.*" class="flex items-center text-sm text-gray-600 h-12 pr-4 border-r border-gray-300 hover:text-gray-800 transition">
                                @if ($_center->type == 'personal_clinic')
                                    @lang('Personal clinic of :user', ['user' => $_center->manager->name])
                                @else
                                {{ $_center->detail->title }}
                                @endif
                            </a>
                        </li>
                        @endforeach
                    </ul>
                    @else
                    <ul class="pr-8 mt-2">
                        <li>
                            <a href="{{ route('dashboard.centers.index', ['my' => 'yes']) }}" data-metarget="centers-myclinics" class="flex flex-col justify-center text-sm text-gray-600 h-12 pr-4 border-r border-gray-300 hover:text-gray-800 transition">
                                <div class="variable-font-medium">{{  __('My therapy centers') }}</div>
                                <div class="text-xs variable-font-light">لیست مراکز مرتبط با من</div>
                            </a>
                        </li>
                    </ul>
                    @endif
                @endif
            </li>
            @if (false)
                <li class="mb-1">
                    <a href="{{ route('dashboard.rooms.index') }}" data-metarget="rooms" data-metarget-pattern="^/dashboard/rooms.*" class="flex justify-between items-center h-12 px-6 rounded text-gray-900 hover:bg-gray-200 transition">
                        <div class="flex items-center">
                            <i class="fal fa-door-open ml-3"></i>
                            <div>
                                <div class="variable-font-medium">{{ __('Rooms') }}</div>
                                <div class="text-xs variable-font-light">اتاق‌های درمانی من</div>
                            </div>
                        </div>
                    </a>
                </li>
                <li class="mb-1">
                    <a href="{{ route('dashboard.cases.index') }}" data-metarget="cases" data-metarget-pattern="^/dashboard/cases.*" class="flex justify-between items-center h-12 px-6 rounded text-gray-900 hover:bg-gray-200 transition">
                        <div class="flex items-center">
                            <i class="fal fa-folders ml-3"></i>
                            <div>
                                <div class="variable-font-medium">{{ __('Cases') }}</div>
                                <div class="text-xs variable-font-light">پرونده‌های درمانی من</div>
                            </div>
                        </div>
                    </a>
                </li>
            @endif
            <li class="mb-1">
                <a href="{{ route('dashboard.sessions.index') }}" data-metarget="session" data-metarget-pattern="^/dashboard/session.*" class="flex justify-between items-center h-12 px-6 rounded text-gray-900 hover:bg-gray-200 transition">
                    <div class="flex items-center">
                        <i class="fal fa-user-friends ml-2"></i>
                        <div>
                            <div class="variable-font-medium">{{ __('Sessions') }}</div>
                            <div class="text-xs variable-font-light">جلسات درمانی من</div>
                        </div>
                    </div>
                </a>
            </li>
            @if (auth()->isAdmin())
            <li class="mb-1">
                <a href="{{ route('dashboard.users.index') }}" data-metarget="users" data-metarget-pattern="^/dashboard/users.*" class="flex justify-between items-center h-12 px-6 rounded text-gray-900 hover:bg-gray-200 transition">
                    <div class="flex items-center">
                        <i class="fal fa-users ml-2"></i>
                        <span class="variable-font-light pt-1">{{ __('Users') }}</span>
                    </div>
                </a>
            </li>
            @endif
            <li class="mb-1">
                <a href="{{ route('dashboard.assessments.index') }}" data-metarget="assessments" data-metarget-pattern="^/dashboard/assessments.*" class="flex justify-between items-center h-12 px-6 rounded text-gray-900 hover:bg-gray-200 transition">
                    <div class="flex items-center">
                        <i class="fal fa-balance-scale ml-3"></i>
                        <div>
                            <div class="variable-font-medium">{{ __('Assessments') }}</div>
                            <div class="text-xs variable-font-light">لیست نمونه‌های موجود در سامانه</div>
                        </div>
                    </div>
                </a>
            </li>
            <li class="mb-1">
                <a href="{{ route('dashboard.samples.index') }}" data-metarget="samples" data-metarget-pattern="^/dashboard/samples.*" class="flex justify-between items-center h-12 px-6 rounded text-gray-900 hover:bg-gray-200 transition">
                    <div class="flex items-center">
                        <i class="fal fa-vial ml-2"></i>
                        <div>
                            <div class="variable-font-medium">{{ __('Samples') }}</div>
                            <div class="text-xs variable-font-light">نمونه‌های گرفته‌شده</div>
                        </div>
                    </div>
                </a>
                @if (auth()->isAdmin() || (auth()->centers() && auth()->centers()->whereIn('acceptation.position', ['manager', 'operator', 'psychologist'])->first()))
                    <ul class="pr-8 mt-2">
                        <li>
                            <a href="{{ route('dashboard.bulk-samples.index') }}" data-metarget="bulk-samples" data-metarget-pattern="^/dashboard/bulk-samples.*" class="flex flex-col justify-center text-sm text-gray-600 h-12 pr-4 border-r border-gray-300 hover:text-gray-800 transition">
                                <div class="variable-font-medium">@lang('Bulk samples')</div>
                                <div class="text-xs variable-font-light">نمونه‌های زنجیره‌ای</div>
                            </a>
                        </li>
                    </ul>
                @endif
            </li>
            @if (false)
                <li class="mb-1">
                    <a href="{{ route('dashboard.documents.index') }}" data-metarget="samples" data-metarget-pattern="^/dashboard/documents.*" class="flex justify-between items-center h-12 px-6 rounded text-gray-900 hover:bg-gray-200 transition">
                        <div class="flex items-center">
                            <i class="fal fa-file-certificate ml-2"></i>
                            <span class="variable-font-light pt-1">{{ __('Documents') }}</span>
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
