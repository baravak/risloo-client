<div class="absolute top-3 left-3 flex items-center dir-ltr" data-xhr="center-button">

    @if (!$center->acceptation || ($center->acceptation && !in_array($center->acceptation->position, ['client', 'psychologist'])) || auth()->user()->isAdmin())
        <div class="relative dropdown">
            <button type="button" class="flex items-center justify-center border border-gray-300 rounded-full h-9 w-9 hover:bg-gray-100 transition text-2xl text-gray-400 focus mr-2 dropdown-toggle">
                <i class="fal fa-ellipsis-v"></i>
            </button>
            <div class="rounded bg-white border border-gray-200 mt-2 shadow-md dropdown-menu min-w-max absolute left-0">
                @can('viewAny', [App\CenterUser::class, $center])
                    <a href="{{ route('dashboard.center.users.index', $center->id) }}" title="{{ __('Users') }}" class="flex items-center text-sm text-gray-700 py-3 px-4 hover:bg-gray-100 border-b border-gray-100 transition dir-rtl">
                        <i class="w-6 text-center fal fa-users pb-1"></i>
                        <span class="vaiable-font-medium mr-2">@lang('Users')</span>
                    </a>
                @endcan

                <a href="{{ route('dashboard.center.schedules.index', $center->id) }}" class="flex items-center text-sm text-gray-700 py-3 px-4 hover:bg-gray-100 border-b border-gray-100 transition dir-rtl">
                    <i class="w-6 text-center fal fa-calendar-alt pb-1"></i>
                    <span class="vaiable-font-medium mr-2">@lang('Therapy Schedules')</span>
                </a>

                @if (auth()->center($center->id))
                    <a href="{{ route('dashboard.center.users.show', ['center' => $center->id, 'user' => $center->acceptation->id]) }}" class="flex items-center text-sm text-gray-700 py-3 px-4 hover:bg-gray-100 border-b border-gray-100 transition dir-rtl">
                        <i class="w-6 text-center fal fa-user-circle pb-1"></i>
                        <span class="vaiable-font-medium mr-2">@lang('My profile')</span>
                    </a>
                @endif

                @can('update', $center)
                    <a href="{{ $center->route('edit') }}" class="flex items-center text-sm text-gray-700 py-3 px-4 hover:bg-gray-100 border-b border-gray-100 transition dir-rtl">
                        <i class="w-6 text-center fal fa-edit pb-1"></i>
                        <span class="vaiable-font-medium mr-2">@lang('Edit')</span>
                    </a>
                @endcan

                <a href="#" class="flex items-center text-sm text-gray-700 py-3 px-4 hover:bg-gray-100 border-b border-gray-100 transition dir-rtl">
                    <i class="w-6 text-center fal fa-cog pb-1"></i>
                    <span class="vaiable-font-medium mr-2">@lang('Settings')</span>
                </a>
            </div>
        </div>
    @endif

    @include('dashboard.centers.acceptationButton')
    @if ($center->acceptation && in_array($center->acceptation->position, ['client', 'psychologist']) && !auth()->user()->isAdmin())
        <a href="{{ route('dashboard.center.users.show', ['center' => $center->id, 'user' => $center->acceptation->id]) }}" class="flex items-center justify-center border border-gray-300 rounded-full h-9 w-9 hover:bg-gray-100 transition text-gray-400 focus mr-2" title="@lang('My profile')" aria-label="@lang('My profile')">
            <i class="fal fa-user"></i>
        </a>

        <a href="{{ route('dashboard.center.schedules.index', $center->id) }}" class="flex justify-center items-center flex-shrink-0 text-brand hover:text-white hover:bg-brand border border-brand w-auto px-4 sm:px-8 h-9 rounded-full text-xs sm:text-sm transition focus">
            <span class="vaiable-font-medium">@lang('Therapy Schedules')</span>
        </a>
    @endif

</div>
