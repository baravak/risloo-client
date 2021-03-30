<tr class="transition hover:bg-gray-50">
    <td class="px-3 py-2 whitespace-nowrap">
        <div class="flex items-center cursor-default">
            <span class="text-xs text-gray-600 block text-right dir-ltr en">{{ $user->id }}</span>
        </div>
    </td>
    <td class="px-3 py-2 whitespace-nowrap">
        <div class="flex items-center cursor-default">
            <span class="text-xs text-gray-600">{{ $user->name }}</span>
        </div>
    </td>
    <td class="px-3 py-2 whitespace-nowrap">
        <div class="flex items-center">
            @isset($user->email)
            <a href="mailto:{{ $user->email }}" class="block text-right dir-ltr text-xs text-gray-600 hover:text-blue-600 en" target="_blank" title="{{ $user->email }}" aria-label="{{ $user->email }}">
                <span class="hidden md:block">{{ $user->email }}</span>
                <i class="block md:hidden fal fa-envelope-open text-base"></i>
            </a>
            @endisset
        </div>
    </td>
    <td class="px-3 py-2 whitespace-nowrap">
        <div class="flex items-center">
            @isset($user->mobile)
                <a href="tel:+{{ $user->mobile }}" class="block text-right dir-ltr text-xs text-gray-600 hover:text-blue-600" target="_blank" title="{{ $user->mobile }}" aria-label="{{ $user->mobile }}">
                    <span class="hidden md:block">+{{ $user->mobile }}</span>
                    <i class="block md:hidden fal fa-phone text-base"></i>
                </a>
            @endisset
        </div>
    </td>
    <td class="px-3 py-2 whitespace-nowrap">
        <div class="flex items-center cursor-default">
            <span class="block text-right dir-ltr text-xs text-gray-600">{{ $user->username }}</span>
        </div>
    </td>
    <td class="px-3 py-2 whitespace-nowrap">
        <div class="flex items-center cursor-default">
            <span class="block text-right dir-ltr text-xs text-gray-600">{{ __(ucfirst($user->type)) }}</span>
        </div>
    </td>
    <td class="px-3 py-2 whitespace-nowrap">
        <div class="flex items-center cursor-default">
            <span class="block text-right dir-ltr text-xs text-gray-600">{{ __(ucfirst($user->status)) }}</span>
        </div>
    </td>
    <td class="px-3 py-2 whitespace-nowrap text-left dir-ltr">
        <div class="inline-block mr-4">
            <x-link-show :link="$user->route('show')"/>
        </div>
        <div class="inline-block mr-4">
            <a href="{{ $user->route('edit') }}" title="{{ __('Edit') }}" aria-label="{{ __('Edit') }}"><i class="fal fa-edit text-sm leading-relaxed text-gray-600 hover:text-blue-600"></i></a>
        </div>
        @if ($user->type != 'admin')
            <div class="inline-block">
                <a href="{{ route('auth.as', ['user' => $user->id]) }}"  data-lijax="click" data-method="POST" title="{{ __('Login to this...') }}" aria-label="{{ __('Login to this...') }}"><i class="fal fa-user-cog text-sm leading-relaxed text-blue-600 hover:text-blue-600"></i></a>
            </div>
        @endif
    </td>
</tr>