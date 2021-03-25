<tr>
    <td class="px-3 py-2 whitespace-nowrap">
        <div class="flex items-center">
            <span class="text-xs text-gray-700 block text-right dir-ltr cursor-default en">{{ $user->id }}</span>
        </div>
    </td>
    <td class="px-3 py-2 whitespace-nowrap">
        <div class="flex items-center">
            <span class="text-xs text-gray-700 cursor-default">{{ $user->name }}</span>
        </div>
    </td>
    <td class="px-3 py-2 whitespace-nowrap">
        <div class="flex items-center">
            <a href="mailto:{{ $user->email }}" class="block text-right dir-ltr text-xs text-gray-700 hover:text-blue-500" target="_blank">{{ $user->email }}</a>
        </div>
    </td>
    <td class="px-3 py-2 whitespace-nowrap">
        <div class="flex items-center">
            <a href="tel:+{{ $user->mobile }}" class="block text-right dir-ltr text-xs text-gray-700 hover:text-blue-500" target="_blank">{{ $user->mobile }}</a>
        </div>
    </td>
    <td class="px-3 py-2 whitespace-nowrap">
        <div class="flex items-center">
            <span class="block text-right dir-ltr text-xs text-gray-700 cursor-default">{{ $user->username }}</span>
        </div>
    </td>
    <td class="px-3 py-2 whitespace-nowrap">
        <div class="flex items-center">
            <span class="block text-right dir-ltr text-xs text-gray-700 cursor-default">{{ __(ucfirst($user->type)) }}</span>
        </div>
    </td>
    <td class="px-3 py-2 whitespace-nowrap">
        <div class="flex items-center">
            <span class="block text-right dir-ltr text-xs text-gray-500 cursor-default">{{ __(ucfirst($user->status)) }}</span>
        </div>
    </td>
    <td class="px-3 py-2 whitespace-nowrap text-left dir-ltr">
        <div class="inline-block mr-4">
            <x-link-show :link="$user->route('show')"/>
        </div>
        <div class="inline-block mr-4">
            <a href="{{ $user->route('edit') }}" title="{{ __('Edit') }}"><i class="fal fa-edit text-sm leading-relaxed text-gray-600 hover:text-blue-600"></i></a>
        </div>
        @if ($user->type != 'admin')
            <div class="inline-block">
                <a href="{{ route('auth.as', ['user' => $user->id]) }}"  data-lijax="click" data-method="POST" title="{{ __('Login to this...') }}"><i class="fal fa-user-cog text-sm leading-relaxed text-blue-600 hover:text-blue-700"></i></a>
            </div>
        @endif
    </td>
</tr>
