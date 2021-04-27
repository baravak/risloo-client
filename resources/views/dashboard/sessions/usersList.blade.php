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
                            <th class="px-3 py-2 text-right text-xs variable-font-medium text-gray-500" scope="col">{{ __('Problem') }}</th>
                            <th class="px-3 py-2 text-right text-xs variable-font-medium text-gray-500" scope="col">{{ __('Description') }}</th>
                            <th class="px-3 py-2 text-right text-xs variable-font-medium text-gray-500" scope="col">{{ __('Field') }}</th>
                            <th class="px-3 py-2 text-right text-xs variable-font-medium text-gray-500" scope="col">{{ __('Case') }}</th>
                            <th class="px-3 py-2 text-right text-xs variable-font-medium text-gray-500" scope="col">{{ __('Status') }}</th>
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
                                        <span class="text-xs text-gray-600">@lang($user->problem)</span>
                                    </div>
                                </td>
                                <td class="px-3 py-2 whitespace-nowrap">
                                    <div class="flex items-center cursor-default">
                                        <span class="text-xs text-gray-600">@lang($user->description)</span>
                                    </div>
                                </td>
                                <td class="px-3 py-2 whitespace-nowrap">
                                    <div class="flex items-center cursor-default">
                                        <span class="text-xs text-gray-600">{{ $user->field ? $user->field->title : '-' }}</span>
                                    </div>
                                </td>
                                <td class="px-3 py-2 whitespace-nowrap">
                                    <div class="flex items-center cursor-default">
                                        <span class="text-xs text-gray-600">{{ $user->case ? $user->case->id : '-' }}</span>
                                    </div>
                                </td>
                                <td class="px-3 py-2 whitespace-nowrap">
                                    <div class="flex items-center">
                                        @can('addUser', $session)
                                            <select class="text-xs text-gray-700 border border-gray-400 rounded-full py-1 px-8" name="position" data-lijax="change" data-action="{{ route('dashboard.session.users.update', ['session' => $session->id, 'user'=> $user->id]) }}" data-method="PUT">
                                                @foreach (['client', 'apply', 'remove'] as $item)
                                                    <option value="{{ $item }}" @selectChecked($user->position, $item)>@lang(ucfirst($item))</option>
                                                @endforeach
                                            </select>
                                            <span class="spinner relative"></span>
                                        @else
                                        @lang($user->position)
                                        @endcan
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
