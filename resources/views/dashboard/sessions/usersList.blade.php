<div data-xhr="user-items">
    <div class="overflow-x-auto">
        <div class="align-middle inline-block min-w-full">
            <div class="overflow-hidden border border-gray-200 rounded">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50 cursor-default">
                        <tr>
                            <th class="px-3 py-2 text-right text-xs variable-font-medium text-gray-500" scope="col">{{ __('Row') }}</th>
                            <th class="px-3 py-2 text-right text-xs variable-font-medium text-gray-500" scope="col">{{ __('Client') }}</th>
                            <th class="px-3 py-2 text-right text-xs variable-font-medium text-gray-500" scope="col">{{ __('Mobile') }}</th>
                            <th class="px-3 py-2 text-right text-xs variable-font-medium text-gray-500" scope="col">وضعیت ثبت‌نام جلسه</th>
                            <th class="px-3 py-2" scope="col"></th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach ($session->clients ?: [] as $user)
                            <tr class="transition hover:bg-gray-50">
                                <td class="px-3 py-2 whitespace-nowrap">
                                    <div class="flex items-center cursor-default">
                                        <span class="text-xs text-gray-600">{{ $loop->index + 1 }}</span>
                                    </div>
                                </td>
                                <td class="px-3 py-2 whitespace-nowrap">
                                    <div class="flex items-center cursor-default">
                                        <a href="#" class="text-xs text-gray-600 hover:text-blue-600 transition">{{ $user->name }}</a>
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
                                        <span class="block text-right dir-ltr text-xs text-gray-600">@lang($user->position)</span>
                                    </div>
                                </td>
                                <td class="px-3 py-2 whitespace-nowrap text-left dir-ltr">
                                    <div class="inline-block mr-4">
                                        <a href="#" title="{{ __('Edit') }}" aria-label="{{ __('Edit') }}"><i class="fal fa-edit text-sm leading-relaxed text-gray-600 hover:text-blue-600"></i></a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{-- {{$users->links()}} --}}
</div>
