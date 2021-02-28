@foreach ($users as $user)
<span data-id="{{ $user->id }}">
    <span data-selection>
        @displayName($user->user)
    </span>
</span>
@endforeach
