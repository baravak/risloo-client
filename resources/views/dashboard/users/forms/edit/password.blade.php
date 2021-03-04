<form class="w-full mt-6" action="{{route('dashboard.users.change-password', ['user' => $user->id])}}" method="POST">
    <div>
        @if (auth()->isAdmin() || auth()->user()->no_password)
        @else
            <div class="mt-4">
                <label for="cp-password" class="block mb-2 text-sm text-gray-700 font-medium">{{ __('Current password') }}</label>
                <input type="password" id="cp-password" name="password" autocomplete="password" class="border border-gray-500 h-10 rounded px-4 w-full text-left dir-ltr focus:border-brand focus:outline-none focus:ring-2 focus:ring-offset-1 focus:ring-opacity-60">
            </div>
        @endif
        <div class="mt-4">
            <label for="cp-new-password" class="block mb-2 text-sm text-gray-700 font-medium">{{ __('New password') }}</label>
            <input type="password" id="cp-new-password" name="new_password" autocomplete="password" class="border border-gray-500 h-10 rounded px-4 w-full text-left dir-ltr focus:border-brand focus:outline-none focus:ring-2 focus:ring-offset-1 focus:ring-opacity-60">
            <div class="flex items-center text-xs text-gray-400 mt-2">
                <i class="fal fa-info-circle ml-1"></i>
                <span>{{ __('Password help') }}</span>
            </div>
        </div>

         <div class="flex justify-end">
            <button type="submit" class="items-center min-w-min w-36 h-9 px-4 bg-brand text-white text-sm rounded-full hover:bg-blue-800 transition mt-6">
                {{__('Change password')}}
            </button>
        </div>
    </div>
</form>
