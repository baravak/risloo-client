<form class="w-full mt-6" action="{{route('dashboard.centers.avatar.store', ['center' => $center->id])}}" method="POST">
    <div>
        <label>
            <input type="file" class="hidden input-avatar" data-afile-field="filed-avatar" id="avatar-file" accept="image/png, image/jpeg, image/jpg, image/gif">
            <input type="file" class="hidden" name="avatar" id="filed-avatar">
            <div data-afile-default="avatar-file">
                <div class="flex justify-start items-center flex-shrink-0 w-24 h-24 md:w-32 md:h-32 bg-gray-300 text-gray-600 text-2xl rounded-full border-4 border-white overflow-hidden mb-4 relative">
                    @avatarOrName($center->detail)
                </div>
                <div class="flex items-center text-xs text-gray-400 mt-2">
                    <i class="fal fa-info-circle ml-1"></i>
                    <span>{{ __('Edit avatar help') }}</span>
                </div>
            </div>
        </label>
        <div data-afile-pannel="avatar-file" class="w-96 h-96 mb-20 content-center mx-auto">

        </div>
    </div>

    <div class="flex justify-end">

        <button type="submit" class="items-center min-w-min w-36 h-9 px-4 bg-brand text-white text-sm rounded-full hover:bg-blue-800 transition mt-6">
            {{ __('Edition') }}
        </button>
        <button type="button" data-for="avatar-file" class="afile-destroy text-gray-500 hover:text-gray-700 text-sm px-4 mr-2 h-8 focus rounded-full items-center min-w-min w-36 h-9 px-4 text-sm rounded-full transition mt-6">
            {{ __('Cancel') }}
        </button>
    </div>
</form>
