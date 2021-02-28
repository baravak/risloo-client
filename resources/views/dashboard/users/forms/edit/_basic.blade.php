<form action="{{route('dashboard.users.update', ['user' => $user->id])}}" method="POST">
    @method('PUT')
    <div>
        @include('dashboard.users.forms.basic')
        <div class="flex justify-end">
            <button type="submit" class="items-center min-w-min w-36 h-9 px-4 bg-brand text-white text-sm rounded-full hover:bg-blue-800 transition mt-6">
                {{ __('Edition') }}
            </button>
        </div>
    </div>
</form>