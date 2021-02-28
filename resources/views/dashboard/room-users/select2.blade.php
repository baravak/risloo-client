@foreach ($users as $user)
<span data-id="{{ $user->id }}">
    @displayName($user->user)
</span>
@endforeach
