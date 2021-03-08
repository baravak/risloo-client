@extends($layouts->dashboard)

@section('content')
    <div id="sample-show" data-status="{{$sample->status}}" data-sample="{{$sample->id}}">
        <div class="border border-gray-200 rounded p-4">
            <h3 class="font-bold text-gray-900 cursor-default">{{ $sample->scale->title }}</h3>
            <div class="flex items-center text-sm text-gray-500 cursor-default mt-4">
                @if ($sample->client)
                    <a href="{{ route('dashboard.center.users.show', ['center' => $center->id, 'user' => $sample->client->id]) }}">
                        <i class="fal fa-user mb-1 ml-2"></i>
                        <span>{{ $sample->client ? $sample->client->name: '' }}</span>
                    </a>
                @else
                    <div class="flex items-center">
                        <i class="fal fa-user mb-1 ml-2"></i>
                        <span>{{ __('No client and select client') }}</span>
                    </div>
                @endif
            </div>
            @if (!in_array($sample->status, ['scoring', 'creating_files']))
            <div class="flex flex-col sm:flex-row sm:items-end sm:justify-between mt-2 sm:mt-0">
                <div>
                    <span class="text-xs text-gray-400 cursor-default">{{ __(ucfirst($sample->status)) }}</span>
                </div>
                <div class="mt-2 sm:mt-0">
                    @if ($sample->client)
                        @include('dashboard.samples.tools')
                    @endif
                    <div class="relative inline-flex dropdown {{in_array($sample->status, ['seald', 'open', 'closed', 'scoring']) ? 'hidden' : ''}}" id="profile-export-menu">
                        <button class="flex items-center px-4 h-8 text-xs text-brand hover:text-white hover:bg-brand border border-brand rounded-full transition dropdown-toggle" type="button" id="profile-export" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ __('Exports') }}
                            <i class="fal fa-chevron-down mr-2"></i>
                        </button>
                        <div aria-labelledby="profile-export" id="profile-export-list" class="absolute left-0 top-10 rounded bg-white border border-gray-200 shadow-lg dropdown-menu">
                            @if ($sample->profiles)
                                @foreach ($sample->profiles as $key => $item)
                                    <a href="{!!$item->url!!}" data-type="{{$item->mode}}" class="dropdown-item direct profile-{{$item->mode}} block w-full p-1 text-center rounded text-gray-600 hover:text-brand hover:bg-gray-100">
                                        {{ strtoupper(str_replace('_', ' ', str_replace('profile_', '', $item->mode))) }}
                                    </a>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
    @if (in_array($sample->status, ['scoring', 'creating_files']))

        <div class="flex flex-col items-center justify-center border border-gray-200 rounded py-16 px-4 mt-4">
            <i class="fal fa-spinner-third animate-spin text-gray-500 text-6xl"></i>
            <span class="text-gray-500 mt-6">درحال نمره‌دهی و ساخت فایل‌ها</span>
        </div>

        {{-- <div class="flex flex-col items-center justify-center border border-gray-200 rounded py-16 px-4 mt-4">
            <i class="fal fa-check-circle text-green-700 text-6xl"></i>
            <span class="text-green-700 font-semibold mt-6">با موفقیت انجام شد</span>
            <span class="text-sm text-gray-500 mt-2">در حال انتقال...</span>
        </div> --}}
    @else
        @if ($sample->client)
            @include('dashboard.samples.show-detail')
        @else
            <form method="POST">
                <div class="border border-gray-200 rounded p-4 mt-4">
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
                        <div>
                            <label for="client_id" data-alias="manager_id" class="block mb-2 text-sm text-gray-700 font-medium">{{ __('Select client') }}</label>
                            <select multiple data-template="users" id="room_client_id" name="client_id[]" id="client_id" data-url="{{ isset($room) ? route('dashboard.room.users.index', ['room' => $room->id, 'instance' => 1]) : '' }}" data-url-pattern="{{ route('dashboard.room.users.index', ['room' => '%%', 'status' => 'accepted', 'instance' => 1]) }}" data-placeholder="{{ __('Without specified client') }}" class="select2-select"></select>
                        </div>
                    </div>
                    <div class="mt-4">
                        <button type="submit" class="inline-flex justify-center items-center h-9 px-8 bg-brand text-white text-sm rounded-full hover:bg-blue-800 transition ml-4">
                            {{ __('Submit') }}
                        </button>
                    </div>
                </div>
            </form>
        @endif
    @endif
@endsection
