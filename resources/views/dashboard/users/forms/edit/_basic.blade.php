<form action="{{ route('dashboard.users.update', ['user' => $user->id]) }}" method="POST">
    @method('PUT')
    @include('dashboard.users.forms.basic')
    <div class="flex justify-end mt-6">
        <button type="submit" class="relative w-36 h-9 leading-9 px-4 bg-brand text-white text-sm rounded-full hover:bg-brand-600 transition">
            <span>{{ __('Edition') }}</span>
            <i class="fad fa-spinner-third absolute top-2.5 left-4 animate-spin hidden"></i>
        </button>
    </div>
</form>