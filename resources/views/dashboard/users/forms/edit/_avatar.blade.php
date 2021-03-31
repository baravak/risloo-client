<div id="avatar-tab" data-xhr="avatar-tab">
    <form class="w-full mt-6" action="{{route('dashboard.users.avatar.store', ['user' => $user->id])}}" method="POST">
        <div class="p-4 border border-gray-200 rounded">
            <label>
                <input type="file" class="hidden input-avatar" data-afile-field="filed-avatar" id="avatar-file" accept="image/png, image/jpeg, image/jpg, image/gif">
                <input type="file" class="hidden" name="avatar" id="filed-avatar">
                <div data-afile-default="avatar-file" class="flex flex-col items-center">
                    <div class="flex justify-center items-center flex-shrink-0 w-24 h-24 md:w-32 md:h-32 bg-gray-300 text-gray-600 text-2xl rounded-full border-4 border-white overflow-hidden mb-4 relative cursor-pointer">
                        @avatarOrName($user)
                    </div>
                    <div class="flex items-center text-xs text-gray-400 mt-2">
                        <i class="fal fa-info-circle ml-1"></i>
                        <span>{{ __('Edit avatar help') }}</span>
                    </div>
                </div>
            </label>
            <div data-afile-pannel="avatar-file" class="w-64 h-64 mb-8 mx-auto"></div>
        </div>
        <button type="submit" class="inline-flex items-center justify-center h-9 mt-4 px-8 bg-brand text-white text-sm rounded-full hover:bg-brand-600 transition focus" title="{{ __('Edition') }}" aria-label="{{ __('Edition') }}" role="button">
            {{ __('Edition') }}
        </button>
        <button type="button" data-for="avatar-file" class="afile-destroy text-gray-500 hover:text-gray-700 text-sm px-4 mr-2 h-8 rounded-full transition focus" title="{{ __('Cancel') }}" aria-label="{{ __('Cancel') }}" role="button">
            {{ __('Cancel') }}
        </button>
    </form>
</div>