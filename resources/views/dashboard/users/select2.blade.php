@foreach ($users as $user)
<div data-id="{{ $user->id }}">
    <div data-selection class="pt-2">
        <div class="text-sm text-gray-700 font-medium">@displayName($user)</div>
    </div>
</div>
@endforeach
