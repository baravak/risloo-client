<form action="{{ route('dashboard.users.update', ['user' => $user->id]) }}" method="POST">
    @method('PUT')
    <div class="p-4 border border-gray-200 rounded">
        @include('dashboard.users.forms.basic')
    </div>
    <button type="submit" class="inline-flex items-center justify-center h-9 mt-4 px-8 bg-brand text-white text-sm rounded-full hover:bg-brand-600 focus transition">
        <span>{{ __('Edition') }}</span>
    </button>
</form>