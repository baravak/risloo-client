<form class="w-full mt-6" action="{{route('dashboard.users.update', ['user' => $user->id])}}" method="POST">
    @csrf
    <input type="hidden" name="_method" value="PUT">
    <div>
        <div class="mt-4">
            <label for="p-name" class="block mb-2 text-sm text-gray-700 font-medium">{{ __('Display name') }}</label>
            <input type="text" name="name" id="p-name" autocomplete="off" @formValue($user->name) class="border border-gray-500 h-10 rounded px-4 w-full text-sm focus:border-brand focus:outline-none focus:ring-2 focus:ring-offset-1 focus:ring-opacity-60">
        </div>

        <div class="mt-4">
            <label for="p-username" class="block mb-2 text-sm text-gray-700 font-medium">{{ __('Username') }}</label>
            <input type="text" name="username" id="p-username" autocomplete="off" @formValue($user->username) class="border border-gray-500 h-10 rounded px-4 w-full text-sm text-left dir-ltr focus:border-brand focus:outline-none focus:ring-2 focus:ring-offset-1 focus:ring-opacity-60">
            <div class="flex items-center text-xs text-gray-400 mt-2">
                <i class="fal fa-info-circle ml-1"></i> 
                <span>{{ __('Username help') }}</span>
            </div>
        </div>
        
        <div class="mt-4">
            <label for="p-email" class="block mb-2 text-sm text-gray-700 font-medium">{{ __('Email') }}</label>
            <input type="text" name="email" id="p-email" autocomplete="off" @formValue($user->email) class="border border-gray-500 h-10 rounded px-4 w-full text-sm text-left dir-ltr focus:border-brand focus:outline-none focus:ring-2 focus:ring-offset-1 focus:ring-opacity-60">
        </div>
        
        <div class="mt-4">
            <h3 class="block mb-2 text-sm text-gray-700 font-medium">{{ __('Gender') }}</h3>
            <div class="mt-1">
                <label class="inline-flex items-center group">
                    <input type="radio" name="gender" id="gender-male" value="male" @radioChecked($user->gender, 'male') class="w-3.5 h-3.5 border border-gray-600 focus:ring-2 focus:ring-offset-2">
                    <span class="text-sm text-gray-600 mr-2 group-hover:text-blue-600">{{ __('Male') }}</span>  
                </label>
            </div>
            <div class="mt-1">
                <label class="inline-flex items-center group">
                    <input type="radio" name="gender" id="gender-female" value="female" @radioChecked($user->gender, 'female') class="w-3.5 h-3.5 border border-gray-600 focus:ring-2 focus:ring-offset-2">
                    <span class="text-sm text-gray-600 mr-2 group-hover:text-blue-600">{{ __('Female') }}</span>  
                </label>
            </div>
        </div>
        @yield('custom-personal')
        <div class="flex justify-end">
            <button type="submit" class="items-center min-w-min w-36 h-9 px-4 bg-brand text-white text-sm rounded-full hover:bg-blue-800 transition mt-6">
                {{ __('Edition') }}
            </button>
        </div>
    </div>
</form>
