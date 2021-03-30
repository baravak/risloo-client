<div>
    <label for="name" class="block mb-2 text-sm text-gray-700 variable-font-medium cursor-default">{{ __('Display name') }}</label>
    <input type="text" name="name" id="name" autocomplete="off" @formValue($user->name) class="border border-gray-500 h-10 rounded px-4 w-full text-sm focus:border-brand focus:outline-none focus:ring-2 focus:ring-offset-1 focus:ring-opacity-60">
</div>

<div class="mt-4">
    <label for="mobile" class="block mb-2 text-sm text-gray-700 variable-font-medium cursor-default">{{ __('Mobile') }}</label>
    <input type="text" name="mobile" id="mobile" autocomplete="off" @formValue($user->mobile) class="border border-gray-500 h-10 rounded px-4 w-full text-sm text-left dir-ltr focus:border-brand focus:outline-none focus:ring-2 focus:ring-offset-1 focus:ring-opacity-60">
</div>

<div class="mt-4">
    <label for="username" class="block mb-2 text-sm text-gray-700 variable-font-medium cursor-default">{{ __('Username') }}</label>
    <input type="text" name="username" id="username" autocomplete="off" @formValue($user->username) class="border border-gray-500 h-10 rounded px-4 w-full text-sm text-left dir-ltr focus:border-brand focus:outline-none focus:ring-2 focus:ring-offset-1 focus:ring-opacity-60">
    <div class="flex items-center text-xs text-gray-400 mt-2 cursor-default">
        <i class="fal fa-info-circle ml-1"></i>
        <span>{{ __('Username help') }}</span>
    </div>
</div>

<div class="mt-4">
    <label for="email" class="block mb-2 text-sm text-gray-700 variable-font-medium cursor-default">{{ __('Email') }}</label>
    <input type="text" name="email" id="email" autocomplete="off" @formValue($user->email) class="border border-gray-500 h-10 rounded px-4 w-full text-sm text-left dir-ltr focus:border-brand focus:outline-none focus:ring-2 focus:ring-offset-1 focus:ring-opacity-60">
</div>

<div class="mt-4">
    <label for="password" class="block mb-2 text-sm text-gray-700 variable-font-medium cursor-default">{{ __('Password') }}</label>
    <input type="password" name="password" id="password" autocomplete="new-password"class="border border-gray-500 h-10 rounded px-4 w-full text-left dir-ltr focus:border-brand focus:outline-none focus:ring-2 focus:ring-offset-1 focus:ring-opacity-60">
    <div class="flex items-center text-xs text-gray-400 mt-2 cursor-default">
        <i class="fal fa-info-circle ml-1"></i>
        <span>{{ __('Password help') }}</span>
    </div>
</div>

<div class="mt-4">
    <h3 class="block mb-2 text-sm text-gray-700 variable-font-medium cursor-default">{{ __('Status') }}</h3>
    <div class="mt-1">
        <label class="inline-flex items-center group">
            <input type="radio" name="status" id="status-active" value="active" @radioChecked($user->status, 'active') class="w-3.5 h-3.5 border border-gray-600 focus">
            <span class="text-sm text-gray-600 mr-2 group-hover:text-blue-600">{{ __('Active') }}</span>
        </label>
    </div>
    <div class="mt-1">
        <label class="inline-flex items-center group">
            <input type="radio" name="status" id="status-awaiting" value="awaiting" @radioChecked($user->status, 'awaiting') class="w-3.5 h-3.5 border border-gray-600 focus">
            <span class="text-sm text-gray-600 mr-2 group-hover:text-blue-600">{{ __('Awaiting') }}</span>
        </label>
    </div>
    <div class="mt-1">
        <label class="inline-flex items-center group">
            <input type="radio" name="status" id="status-blocked" value="blocked" @radioChecked($user->status, 'blocked') class="w-3.5 h-3.5 border border-gray-600 focus">
            <span class="text-sm text-gray-600 mr-2 group-hover:text-blue-600">{{ __('Blocked') }}</span>
        </label>
    </div>
</div>

<div class="mt-4">
    <h3 class="block mb-2 text-sm text-gray-700 variable-font-medium cursor-default">{{ __('User type') }}</h3>
    @includeFirst(['dashboard.users.createTypes', 'dashboard.users._createTypes'])
</div>

<div class="mt-4">
    <h3 class="block mb-2 text-sm text-gray-700 variable-font-medium cursor-default">{{ __('Gender') }}</h3>
    <div class="mt-1">
        <label class="inline-flex items-center group">
            <input type="radio" name="gender" id="gender-male" value="male" @radioChecked($user->gender, 'male') class="w-3.5 h-3.5 border border-gray-600 focus">
            <span class="text-sm text-gray-600 mr-2 group-hover:text-blue-600">{{ __('Male') }}</span>
        </label>
    </div>
    <div class="mt-1">
        <label class="inline-flex items-center group">
            <input type="radio" name="gender" id="gender-female" value="female" @radioChecked($user->gender, 'female') class="w-3.5 h-3.5 border border-gray-600 focus">
            <span class="text-sm text-gray-600 mr-2 group-hover:text-blue-600">{{ __('Female') }}</span>
        </label>
    </div>
</div>