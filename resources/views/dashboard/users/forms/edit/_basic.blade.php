<form action="{{ route('dashboard.users.update', ['user' => $user->id]) }}" method="POST">
    @method('PUT')
    @include('dashboard.users.forms.basic')
    <div class="flex justify-end mt-6">
        <button type="submit" class="w-36 h-9 px-4 bg-brand text-white text-sm rounded-full hover:bg-brand-600 transition">{{ __('Edition') }}</button>
    </div>
</form>