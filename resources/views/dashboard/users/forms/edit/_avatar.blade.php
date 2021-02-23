<form class="w-full mt-6" action="{{route('dashboard.users.avatar.store', ['user' => $user->id])}}" method="POST">
        <div>
            <label>
                <input type="file" class="hidden" id="avatar-file" name="avatar">
                <div class="flex justify-start items-center flex-shrink-0 w-24 h-24 md:w-32 md:h-32 bg-gray-300 text-gray-600 text-2xl rounded-full border-4 border-white overflow-hidden mb-4 relative">
                    <img src="{{ $user->avatar_url->url('small') }}" alt="{{ __('Avatar') }}">
                </div>
                <div class="flex items-center text-xs text-gray-400 mt-2">
                    <i class="fal fa-info-circle ml-1"></i> 
                    <span>{{ __('Edit avatar help') }}</span>
                </div>
            </label>
        </div>

        <div class="flex justify-end">
            <button type="submit" class="items-center min-w-min w-36 h-9 px-4 bg-brand text-white text-sm rounded-full hover:bg-blue-800 transition mt-6">
                {{ __('Edition') }}
            </button>
        </div>
    </div>
</form>
