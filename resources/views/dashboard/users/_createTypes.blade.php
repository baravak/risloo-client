@foreach (config('users.types', []) as $type => $options)
    <div class="mt-1">
        <label class="inline-flex items-center group">
            <input type="radio" name="type" id="type-{{$type}}" value="{{$type}}" @radioChecked($user->type, $type) class="w-3.5 h-3.5 border border-gray-600 focus">
            <span class="text-sm text-gray-600 mr-2 group-hover:text-blue-600">{{ __(ucfirst($type)) }}</span>
        </label>
    </div>
@endforeach