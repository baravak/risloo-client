<form action="{{ route('dashboard.users.update', ['user' => $user->id]) }}" method="POST">
    @method('PUT')
    <div class="p-4 border border-gray-200 rounded">
        @include('dashboard.users.forms.basic')
    </div>
    <button type="submit" class="inline-flex items-center justify-center h-9 mt-4 px-8 bg-brand hover:bg-brand-600 text-sm text-white rounded-full focus transition" title="{{ __('Edition') }}" aria-label="{{ __('Edition') }}" role="button">
        {{ __('Edition') }}
    </button>
</form>