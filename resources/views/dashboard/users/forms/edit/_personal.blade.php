<form class="w-full mt-6" action="{{route('dashboard.users.update', ['user' => $user->id])}}" method="POST">
    @csrf
    <input type="hidden" name="_method" value="PUT">
    <div class="p-4 border border-gray-200 rounded">
        <div>
            <label for="p-name" class="block mb-2 text-sm text-gray-700 variable-font-medium">{{ __('Display name') }}</label>
            <input type="text" name="name" id="p-name" autocomplete="off" @formValue($user->name) class="border border-gray-500 h-10 rounded px-4 w-full text-sm focus:border-brand focus">
        </div>

        @if (false)
            <div class="mt-4">
                <label for="p-username" class="block mb-2 text-sm text-gray-700 variable-font-medium">{{ __('Username') }}</label>
                <input type="text" name="username" id="p-username" autocomplete="off" @formValue($user->username) class="border border-gray-500 h-10 rounded px-4 w-full text-sm text-left dir-ltr focus:border-brand focus">
                <div class="flex items-center text-xs text-gray-400 mt-2 cursor-default">
                    <i class="fal fa-info-circle ml-1"></i>
                    <span>{{ __('Username help') }}</span>
                </div>
            </div>

            <div class="mt-4">
                <label for="p-email" class="block mb-2 text-sm text-gray-700 variable-font-medium">{{ __('Email') }}</label>
                <input type="text" name="email" id="p-email" autocomplete="off" @formValue($user->email) class="border border-gray-500 h-10 rounded px-4 w-full text-sm text-left dir-ltr focus:border-brand focus">
            </div>
        @endif

        <div class="mt-4">
            <h3 class="block mb-2 text-sm text-gray-700 variable-font-medium cursor-default">{{ __('Gender') }}</h3>
            <div class="mt-1">
                <label class="inline-flex items-center group">
                    <input type="radio" name="gender" id="personal-gender-male" value="male" @radioChecked($user->gender, 'male') class="w-3.5 h-3.5 border focus">
                    <span class="text-sm text-gray-600 mr-2 group-hover:text-blue-600">{{ __('Male') }}</span>
                </label>
            </div>
            <div class="mt-1">
                <label class="inline-flex items-center group">
                    <input type="radio" name="gender" id="personal-gender-female" value="female" @radioChecked($user->gender, 'female') class="w-3.5 h-3.5 border focus">
                    <span class="text-sm text-gray-600 mr-2 group-hover:text-blue-600">{{ __('Female') }}</span>
                </label>
            </div>
        </div>
        @yield('custom-personal')
    </div>
    <button type="submit" class="inline-flex items-center justify-center h-9 mt-4 px-8 bg-brand text-white text-sm rounded-full hover:bg-brand-600 focus transition" title="{{ __('Edition') }}" aria-label="{{ __('Edition') }}" role="button">
        {{ __('Edition') }}
    </button>
</form>