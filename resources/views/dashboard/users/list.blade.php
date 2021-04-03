<div data-xhr="user-items">
    <div class="overflow-x-auto">
        <div class="align-middle inline-block min-w-full">
            <div class="overflow-hidden border border-gray-200 rounded">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50 cursor-default">
                        <tr>
                            <th class="px-3 py-2 text-right text-xs variable-font-medium text-gray-500" scope="col">
                                {{ __('Serial') }}
                                {{-- <a href="#"><i class="fal fa-sort text-xs leading-relaxed text-gray-600 hover:text-blue-600 mr-1"></i></a> --}}
                                {{-- sort up icon --}}
                                {{-- <a href="#"><i class="fal fa-sort-up text-xs leading-relaxed text-gray-600 hover:text-blue-600 mr-1"></i></a> --}}
                                {{-- sort down icon --}}
                                {{-- <a href="#"><i class="fal fa-sort-down text-xs leading-relaxed text-gray-600 hover:text-blue-600 mr-1"></i></a> --}}
                            </th>
                            <th class="px-3 py-2 text-right text-xs variable-font-medium text-gray-500" scope="col">{{ __('Display name') }}</th>
                            <th class="px-3 py-2 text-right text-xs variable-font-medium text-gray-500" scope="col">{{ __('Email') }}</th>
                            <th class="px-3 py-2 text-right text-xs variable-font-medium text-gray-500" scope="col">{{ __('Mobile') }}</th>
                            <th class="px-3 py-2 text-right text-xs variable-font-medium text-gray-500" scope="col">{{ __('Username') }}</th>
                            <th class="px-3 py-2 text-right text-xs variable-font-medium text-gray-500" scope="col">
                                {{ __('Type') }}
                                {{-- <a href="#"><i class="fal fa-filter text-xs leading-relaxed text-gray-600 hover:text-blue-600 mr-1"></i></a> --}}
                            </th>
                            <th class="px-3 py-2 text-right text-xs variable-font-medium text-gray-500" scope="col">
                                {{ __('Status') }}
                                {{-- <a href="#"><i class="fal fa-filter text-xs leading-relaxed text-gray-600 hover:text-blue-600 mr-1"></i></a> --}}
                            </th>
                            <th class="px-3 py-2" scope="col"></th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach ($users as $user)
                                @include('dashboard.users.listRaw')
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{$users->links()}}
</div>