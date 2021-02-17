<div class="overflow-x-auto">
    <div class="align-middle inline-block min-w-full">
        <div class="overflow-hidden border border-gray-200 rounded">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-3 py-2 text-right text-xs font-medium text-gray-500" scope="col">
                            {{ __('Serial') }}
                            <a href="#"><i class="fal fa-sort text-xs leading-relaxed text-gray-600 hover:text-blue-600 mr-1"></i></a>
                            {{-- sort up icon --}}
                            {{-- <a href="#"><i class="fal fa-sort-up text-xs leading-relaxed text-gray-600 hover:text-blue-600 mr-1"></i></a> --}}
                            {{-- sort down icon --}}
                            {{-- <a href="#"><i class="fal fa-sort-down text-xs leading-relaxed text-gray-600 hover:text-blue-600 mr-1"></i></a> --}}
                        </th>
                        <th class="px-3 py-2 text-right text-xs font-medium text-gray-500" scope="col">{{ __('Display name') }}</th>
                        <th class="px-3 py-2 text-right text-xs font-medium text-gray-500" scope="col">{{ __('Email') }}</th>
                        <th class="px-3 py-2 text-right text-xs font-medium text-gray-500" scope="col">{{ __('Mobile') }}</th>
                        <th class="px-3 py-2 text-right text-xs font-medium text-gray-500" scope="col">{{ __('Username') }}</th>
                        <th class="px-3 py-2 text-right text-xs font-medium text-gray-500" scope="col">
                            {{ __('Type') }}
                            <a href="#"><i class="fal fa-filter text-xs leading-relaxed text-gray-600 hover:text-blue-600 mr-1"></i></a>
                        </th>
                        <th class="px-3 py-2 text-right text-xs font-medium text-gray-500" scope="col">
                            {{ __('Status') }}
                            <a href="#"><i class="fal fa-filter text-xs leading-relaxed text-gray-600 hover:text-blue-600 mr-1"></i></a>
                        </th>
                        <th class="px-3 py-2" scope="col"></th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">   
                    @foreach ($users as $user) 
                        <tr>
                            <td class="px-3 py-2 whitespace-nowrap">
                                <div claas="flex items-center">
                                    <span class="text-xs text-gray-700 block text-right dir-ltr cursor-default">{{ $user->id }}</span>
                                </div>
                            </td>
                            <td class="px-3 py-2 whitespace-nowrap">
                                <div claas="flex items-center">
                                    <span class="text-xs text-gray-700 cursor-default">{{ $user->name }}</span>
                                </div>
                            </td>
                            <td class="px-3 py-2 whitespace-nowrap">
                                <div claas="flex items-center">
                                    <a href="#" class="block text-right dir-ltr text-xs text-gray-700 hover:text-blue-500">{{ $user->email }}</a>
                                </div>
                            </td>
                            <td class="px-3 py-2 whitespace-nowrap">
                                <div claas="flex items-center">
                                    <a href="#" class="block text-right dir-ltr text-xs text-gray-700 hover:text-blue-500">{{ $user->mobile }}</a>
                                </div>
                            </td>
                            <td class="px-3 py-2 whitespace-nowrap">
                                <div claas="flex items-center">
                                    <span class="block text-right dir-ltr text-xs text-gray-700 cursor-default">{{ $user->username }}</span>
                                </div>
                            </td>
                            <td class="px-3 py-2 whitespace-nowrap">
                                <div claas="flex items-center">
                                    <span class="block text-right dir-ltr text-xs text-gray-700 cursor-default">{{ __(ucfirst($user->type)) }}</span>
                                </div>
                            </td>
                            <td class="px-3 py-2 whitespace-nowrap">
                                <div claas="flex items-center">
                                    <span class="block text-right dir-ltr text-xs text-gray-500 cursor-default">{{ __(ucfirst($user->status)) }}</span>
                                </div>
                            </td>
                            <td class="px-3 py-2 whitespace-nowrap text-left dir-ltr">
                                <div class="inline-block mr-4">
                                    <x-link-show :link="$user->route('show')"/>
                                </div>
                                <div class="inline-block mr-4">
                                    <a href="#" alt="{{ __('Edition') }}"><i class="fal fa-edit text-sm leading-relaxed text-gray-600 hover:text-blue-600"></i></a>
                                </div>
                                <div class="inline-block">
                                    <a href="#" alt="{{ __('Login to this...') }}"><i class="fal fa-user-cog text-sm leading-relaxed text-blue-600 hover:text-blue-700"></i></a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>