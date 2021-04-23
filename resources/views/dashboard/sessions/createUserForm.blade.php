<div class="m-auto w-full md:w-1/2 mt-4">
    <form class="w-full" method="POST" action="{{ route($session->status =='registration_awaiting' ? 'dashboard.schedules.booking' : 'dashboard.session.users.store', $session->id) }}">
        @method('POST')
        <div class="border border-gray-300 rounded p-4">
            @can('admin', $room)
                @include('dashboard.sessions.createUserFormAdmin')
            @else
            @include('dashboard.sessions.createUserFormClient')
            @endcan
        </div>
        <button type="submit" class="inline-flex justify-center items-center h-9 px-8 bg-brand text-white text-sm rounded-full hover:bg-brand-600 transition ml-4 focus mt-4" role="button">تأیید و ثبت جلسه درمانی</button>

    </form>
</div>
