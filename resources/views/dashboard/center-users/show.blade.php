@extends($layouts->dashboard)
@section('content')
    <div class="border border-gray-200 rounded-sm overflow-hidden">
        <div class="h-20 sm:h-28 bg-gradient-to-b from-blue-100 to-blue-50 border-b border-gray-200"></div>
        <div class="relative p-4">
                <div class="absolute top-3 left-3 flex">

                    <span class="text-xs text-gray-500 flex justify-center items-center px-4 h-9 rounded-full">{{ __(':position of this cenetr', ['position' => __(ucfirst($user->position))]) }}</span>

                </div>
            <div class="flex justify-center items-center flex-shrink-0 w-24 h-24 md:w-32 md:h-32 -mt-16 md:-mt-20 bg-gray-300 text-gray-600 text-2xl rounded-full border-4 border-white overflow-hidden mb-4 relative">
                @avatarOrName($user)
            </div>

            <h2 class="font-bold text-lg text-gray-900 cursor-default">@displayName($user)</h2>

            @if ($user->mobile)
                <div class="flex flex-wrap items-center mt-2">
                    <div class="inline-flex items-center text-gray-500 mb-2 sm:mb-0 ml-6">
                        <i class="fal fa-phone mb-2 ml-2"></i>
                        <a href="tel:+{{ $user->mobile }}" class="block dir-ltr text-right text-sm hover:text-blue-500 direct">+{{ $user->mobile }}</a>
                    </div>
                </div>
            @endif
        </div>
    </div>

    <div class="flex mt-8">

        <div class="w-1/3 pl-2">

            <div class="mb-4">
                <h3 class="heading" data-total="({{ $user->rooms ? $user->rooms->count() : 0 }})" data-xhr="total">{{ __('Therapy rooms') }}</h3>
            </div>

            <div class="grid grid-cols-1 2xl:grid-cols-2 gap-4">
                <div class="border border-gray-200 rounded">
                    @foreach ($user->rooms ?: [] as $room)
                        <a href="{{ $room->route('show') }}" class="flex items-center p-2 hover:bg-gray-50 transition border-b border-gray-200">
                            <div class="flex justify-center items-center flex-shrink-0 w-14 h-14 bg-gray-300 text-gray-600 rounded-full border-2 border-white overflow-hidden">
                                @avatarOrName($room->manager)
                            </div>
                            <div class="mr-4">
                                <span class="block text-sm text-gray-700 font-medium">@displayName($room->manager)</span>
                            </div>
                        </a>
                    @endforeach
                    {{-- <a href="#" class="flex justify-center items-center py-4 hover:bg-gray-50 transition text-xs text-gray-400">بیشتر...</a> --}}
                </div>
            </div>
        </div>

        <div class="w-2/3 pr-2">

            <div class="mb-4">
                <h3 class="heading" data-total="({{ $user->cases ? $user->cases->count() : 0 }})" data-xhr="total">{{ __('Cases') }}</h3>
            </div>

            <div class="overflow-x-auto">
                <div class="align-middle inline-block min-w-full">
                    <div class="overflow-hidden border border-gray-200 rounded">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-3 py-2 text-right text-xs font-medium text-gray-500" scope="col">{{ __('Serial') }}</th>
                                    <th class="px-3 py-2 text-right text-xs font-medium text-gray-500" scope="col">{{ __('Room') }}</th>
                                    <th class="px-3 py-2 text-right text-xs font-medium text-gray-500" scope="col">{{ __('Sessions') }}</th>
                                    <th class="px-3 py-2" scope="col"></th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                @foreach ($user->cases ?: [] as $case)
                                    <tr data-xhr="case-list">
                                        <td class="px-3 py-2 whitespace-nowrap">
                                            <div claas="flex items-center">
                                                <span class="text-xs text-gray-700 block text-right dir-ltr cursor-default">{{ $case->id }}</span>
                                            </div>
                                        </td>
                                        <td class="px-3 py-2 whitespace-nowrap">
                                            <div claas="flex items-center">
                                                <a href="{{ $case->room->route('show') }}" class="text-xs text-gray-700 hover:text-brand">@displayName($case->room->manager)</a>
                                            </div>
                                        </td>
                                        <td class="px-3 py-2 whitespace-nowrap">
                                            <div claas="flex items-center">
                                                <span class="text-xs text-gray-700 cursor-default">{{ $case->sessions_count }}</span>
                                            </div>
                                        </td>
                                        <td class="px-3 py-2 whitespace-nowrap text-left dir-ltr">
                                            <div class="inline-block mr-4">
                                                <a href="{{ $case->route('show') }}"><i class="fal fa-eye text-sm text-gray-600 hover:text-blue-600 relative top-0.5"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            {{-- <a href="#" class="flex justify-center items-center py-2 hover:bg-gray-50 transition text-xs text-gray-400 border border-gray-200 rounded mt-2">بیشتر...</a> --}}
        </div>
    </div>

    <div class="mt-8">
        <div class="mb-4">
            <h3 class="heading" data-total="({{ $user->samples ? $user->samples->count() : 0 }})" data-xhr="total">{{ __('Samples') }}</h3>
        </div>

        <div class="overflow-x-auto">
            <div class="align-middle inline-block min-w-full">
                <div class="overflow-hidden border border-gray-200 rounded">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-3 py-2 text-right text-xs font-medium text-gray-500" scope="col">{{ __('Serial') }}</th>
                                <th class="px-3 py-2 text-right text-xs font-medium text-gray-500" scope="col">{{ __('Scale') }}</th>
                                <th class="px-3 py-2 text-right text-xs font-medium text-gray-500" scope="col">{{ __('Therapy room') }}</th>
                                <th class="px-3 py-2 text-right text-xs font-medium text-gray-500" scope="col">{{ __('Case') }}</th>
                                <th class="px-3 py-2 text-right text-xs font-medium text-gray-500" scope="col">{{ __('Status') }}</th>
                                <th class="px-3 py-2" scope="col"></th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @foreach ($user->samples ?: [] as $sample)
                                <tr  data-xhr="sample-list">
                                    <td class="px-3 py-2 whitespace-nowrap">
                                        <div claas="flex items-center">
                                            <span class="text-xs text-gray-700 block text-right dir-ltr cursor-default">{{ $sample->id }}</span>
                                        </div>
                                    </td>
                                    <td class="px-3 py-2 whitespace-nowrap">
                                        <div claas="flex items-center">
                                            <span class="block text-xs font-medium text-gray-700 cursor-default">{{ $sample->scale->title }}</span>
                                            <span class="block text-gray-400 font-light text-xs">
                                                {{$sample->edition ? __('Edition :title', ['title' => $sample->edition]) .' - ' : ''}} {{ __('Version :ver', ['ver' => $sample->version]) }}
                                            </span>
                                        </div>
                                    </td>
                                    <td class="px-3 py-2 whitespace-nowrap">
                                        <div claas="flex items-center">
                                            <a href="{{ $sample->room->route('show') }}" class="text-xs text-gray-700">
                                                @displayName($sample->room->manager)
                                            </a>
                                        </div>
                                    </td>
                                    <td class="px-3 py-2 whitespace-nowrap">
                                        @if ($sample->case)
                                            <div claas="flex items-center">
                                                <a href="{{ route('dashboard.cases.show', $sample->case->id) }}" class="text-xs text-gray-700">{{ $sample->case->id }}</a>
                                            </div>
                                        @endif
                                    </td>
                                    <td class="px-3 py-2 whitespace-nowrap">
                                        <div claas="flex items-center">
                                            @include('dashboard.samples.tables.status')
                                        </div>
                                    </td>
                                    <td class="px-3 p-3 whitespace-nowrap text-left dir-ltr">
                                            @include('dashboard.samples.do')
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        {{-- <a href="#" class="flex justify-center items-center py-2 hover:bg-gray-50 transition text-xs text-gray-400 border border-gray-200 rounded mt-2">بیشتر...</a> --}}
    </div>
@endsection
